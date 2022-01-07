<?php

require_once('../../../app.php');

//fetch all Notes Users 
if ($request->postHas('action') && $request->postHas('action') == 'fetchAllNotes') {
    $output = '';


    $note = $notes->fetchNoteJoinUser();
    if ($note) {
        $output .= '
                <table class="table table-striped table-bordered texe-center" id="noteTable" >
                    <thead>
                        <tr>
                        <th>#</th> 
                        <th>User Name</th>
                        <th>User E-Mail</th>
                        <th>Note Title</th>
                        <th>Note</th>
                        <th>Written On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        foreach ($note as $index => $row) {
            $output .= ' 
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['title'] . '</td>
                            <td>' . $row['note'] . '</td>
                            <td>' . $row['created_at'] . '</td>
                            <td>' . $row['updated_at'] . '</td>
                            <td> 
                                <a href="#" id="' . $row['id'] . '" title="Delete Note" 
                                    class="text-danger text-white deleteNoteIcon" > 
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                </a> 
                            </td>
                        </tr>';
        }
        $output .= '</tbody>
                </table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No any note written yet !</h3>';
    }
}

// // delete any users 
if ($request->postHas('note_id')) {
    $id = $request->post('note_id');
    $notes->deleteNoteOfUser($id);
}
   