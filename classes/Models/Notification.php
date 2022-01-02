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
        $sql = "SELECT * FROM $this->table WHERE `uid` = '$uid' AND type='user' ";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function removeNotification($id)
    {
        $sql = "DELETE FROM $this->table WHERE `id` = '$id' AND type='user' ";

        mysqli_query($this->conn, $sql);
        return true;
    }
}
