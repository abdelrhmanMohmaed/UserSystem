<?php

require_once('../../../app.php');

if ($request->postHas('action') && $request->postHas('action') == 'fethAllDeleteUsers') {

    $output = "";
    // fetch all user 
    $data = $user->fetchAllUsers(1);
    // photo Path to uploud file
    $photoPath = "../handler/process/";

    if ($data) {
        $output .= '
        <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Verified</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($data as $index => $row) {
            if ($row['photo'] != '') {
                $uPhoto = $photoPath . $row['photo'];
            } else {
                $uPhoto = '../assets/img/2.jpg';
            }
            if ($row['verified'] != 0) {
                $verified = 'Verified';
            } else {
                $verified = 'UnVerified';
            }
            $output .= '
                        <tr>
                            <td>' . $row['id'] . '</td>
                            <td> 
                                <img src="' . $uPhoto . '" class="rounded-circle" width="40px">
                            </td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>' . $row['gender'] . '</td>
                            <td>' . $verified . '</td>
                            <td>
                                    <a href="#" id="' . $row['id'] . '" title="Restore User" class="text-white restoreUserIcon badge badge-dark p-2">Restore</a>
                            </td> 
                        </tr>';
        };
        $output .= '
                        </tbody>
                    </table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No any user deleted yet! </h3>';
    };
}

// restore user 
if ($request->postHas('restore_id')) {

    $id = $request->post('restore_id');
    $user->userAction($id, 1);  
}
