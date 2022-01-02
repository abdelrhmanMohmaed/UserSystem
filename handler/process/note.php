<?php

use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Models\Notes;
use UserSystem\Classes\Models\Notification;

require_once('../../app.php');
include("../../inc/AllDataOfUser.php");

$note = new Notes;
$message = new Message;
$notification = new Notification;
$userId = $uid;
// set notes in db
if ($request->postHas('action') && $request->post('action') == 'add-note') {

    $title =  $request->post('title');
    $notes = $request->post('note');

    if (empty($title) && empty($notes)) {
        echo  "title && note is required";
        return;
    }
    $noteAdded = $note->insertNote($uid, $title, $notes);
    // notification to admin user add note in db
    $notification->insert('uid,type,message', "'$userId','admin','Note added'");
};

// fectch all notes 
if ($request->postHas('action') && $request->post('action') == 'display_notes') {
    $output = '';

    $allNote = $note->get_notes($uid);

    if ($allNote) {
        $output .= ' <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($allNote as $index => $notes) {

            $output .= '<tr>
                                    <td> ' . $index + 1 . '</td>
                                    <td> ' . $notes['title'] . ' </td>
                                    <td> ' . substr($notes['note'], 0, 75) . '... </td>
                                    <td>
                                    <a href="#" id="' . $notes['id'] . '" data-toggle="modal" class="text-primary editBtn" data-target="#editNoteModal " title="Edit Note "><i class="fas fa-edit fa-lg"></i></a>
                                    <a href="#" id="' . $notes['id'] . '" title="View Details" class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i></a>
                                    <a href="#" id="' . $notes['id'] . '" title="Delete Note" class="text-danger deleteBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
                                    </td>
                                </tr>';
        }
        $output .= ' </tbody>
        </table>';
        echo $output;
        // echo 'display_notes';
    } else {
        echo '<h3 class="text-center text-secondary">
                :( You have not written any note yet! Write your first note now! 
        </h3>';
    }
}

//edit note an user by ajax
if ($request->postHas('edit_id')) {
    $id =  $request->post('edit_id');

    $note = $note->edit_note($id);
    echo json_encode($note);
}

//update note of an user by ajax
if ($request->postHas('action') && $request->post('action') == 'update-note') {

    $id =  $request->post('id');
    $title =  $request->post('title');
    $notes =  $request->post('note');

    $note->update_note($id, $title, $notes);
    // echo 'update';

    // notification to admin user update note in db
    $notification->insert('uid,type,message', "'$userId','admin','Note Updated'");
}

//delete note of an userr by ajax
if ($request->postHas('delete_id')) {
    $id =  $request->post('delete_id');

    $note = $note->delete($id);
    echo json_encode($note);
    // notification to admin user add note in db
    $notification->insert('uid,type,message', "'$userId','admin','Note Deleted'");
}

//handle Display a Note of an user Ajax Request 
if ($request->postHas('info_id')) {
    $id =  $request->post('info_id');

    $note = $note->edit_note($id);
    echo json_encode($note);
}
