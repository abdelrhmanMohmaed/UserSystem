<?php


namespace UserSystem\Classes\Models;

use UserSystem\Classes\Db;

class Notes extends Db
{
    public function __construct()
    {
        $this->table = "notes";
        $this->connect();
    }
    // insert by user id
    public function insertNote($uid, $title, $note)
    {
        $sql = "INSERT INTO $this->table (`uid`, `title`, `note`) VALUES ('$uid','$title','$note')";

        mysqli_query($this->conn, $sql);
        return true;
    }
    // fetch all data by uId
    public function get_notes($uid)
    {
        $sql = "SELECT * FROM $this->table WHERE `uid` = '$uid' ";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    //edit note
    public function edit_note($id)
    {
        $sql = "SELECT * FROM $this->table WHERE `id` = '$id' ";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    //update note
    public function update_note($id, $title, $note)
    {
        $sql = "UPDATE $this->table SET title = '$title' , note = '$note' ,updated_at = NOW()
               WHERE `id` = '$id' ";

        mysqli_query($this->conn, $sql);
        return  true;
    }
}
