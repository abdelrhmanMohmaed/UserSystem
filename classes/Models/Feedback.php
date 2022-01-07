<?php


namespace UserSystem\Classes\Models;

use UserSystem\Classes\Db;

class Feedback extends Db
{
    public function __construct()
    {
        $this->table = "feedback";
        $this->connect();
    }
    public function fetchFeedback()
    {
        $sql = "SELECT feedback.id, feedback.subject, feedback.feedback, 
            feedback.created_at, feedback.uid, users.name, users.email
        FROM $this->table INNER JOIN users ON feedback.uid = users.id WHERE replied != 1 ORDER BY
            feedback.id DESC";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function feedbackReplied($fid)
    {
        $sql = "UPDATE $this->table SET replied = 1 WHERE id = '$fid'";

        mysqli_query($this->conn, $sql);
        return true;
    }
}
