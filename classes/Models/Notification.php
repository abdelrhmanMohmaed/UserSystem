<?php


namespace UserSystem\Classes\Models;

use UserSystem\Classes\Db;

class Notification extends Db
{
    public function __construct()
    {
        $this->table = "notification";
        $this->connect();
    }
    public function fetchNotification($uid)
    {
        $sql = "SELECT * FROM $this->table WHERE `uid` = '$uid' AND type = 'user' ";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // remove notification admin and user 
    public function removeNotification($id, $type)
    {
        $sql = "DELETE FROM $this->table WHERE `id` = '$id' AND type = '$type' ";

        mysqli_query($this->conn, $sql);
        return true;
    }
    // Reply feed back 
    public function replyFeedback($uid, $message)
    {
        $sql = "INSERT INTO $this->table (uid, type, message) VALUES ('$uid','user','$message')";

        mysqli_query($this->conn, $sql);
        return true;
    }
    // Fetch Notification
    public function fetchNotificationJoinUser()
    {
        $sql =
            "SELECT notification.id, notification.message, notification.created_at, users.name, users.email
                FROM $this->table 
                INNER JOIN users ON  notification.uid = users.id 
                WHERE type = 'admin' ORDER BY notification.id DESC LIMIT 5";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
 
}
