
<?php

require_once('../../../app.php');

//fetch all feedback of Users 
if ($request->getHas('export') && $request->getHas('export') == 'excel') {
    // all data to excel sheet
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=users.xls");
    header("Pragma: no-cache");
    header("Expries: 0");

    // all data to all user in db
    $data = $user->selectAll();
    echo
    '<table border="1" align=center>';
    echo
    '<tr>
            <th>#</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>JOined ON</th>
            <th>Verified</th>
            <th>Deleted</th>
        </tr>';
    foreach ($data as $index => $row) {
        if ($row['verified'] != 0) {
            $verified = 'Verified';
        } else {
            $verified = 'UnVerified';
        }
        echo    '<tr>
                    <td>' . $index . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['gender'] . '</td>
                    <td>' . $row['dob'] . '</td>
                    <td>' . $row['created_at'] . '</td>
                    <td>' . $verified . '</td>
                    <td>' . $row['deleted'] . '</td>
                </tr>';
    }
    echo '</table>';
}
