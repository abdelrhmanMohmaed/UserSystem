<?php

require_once('../../../app.php');

// fetch all user 
if ($request->postHas('action') && $request->postHas('action') == 'fethAllUsers') {

    $output = "";
    // fetch all user 
    $data = $user->fetchAllUsers(0);
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
                                    <a href="#" id="' . $row['id'] . '" data-toggle="modal" data-target="#showUserDetailsModal" title="View Details" class="text-primary userDetailsIcon"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
                                    <a href="#" id="' . $row['id'] . '" title="Delete User" class="text-danger deleteUserIcon"><i class="fas fa-trash fa-lg"></i></a>&nbsp;&nbsp;
                            </td> 
                        </tr>';
        };
        $output .= '
                        </tbody>
                    </table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No any user registered yet! </h3>';
    };
}

// fetch all user Details 
if ($request->postHas('details_id')) {

    $id = $request->post('details_id');
    $data =  $user->fetchAllUserDetails($id);

    echo json_encode($data);
}

// delete user 
if ($request->postHas('delete_id')) {

    $id = $request->post('delete_id');
    $user->userAction($id, 0);  
}
