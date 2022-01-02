<?php


namespace UserSystem\Classes\Models;

use UserSystem\Classes\Db;

class Users extends Db
{
    public function __construct()
    {
        $this->table = "users";
        $this->connect();
    }

    // update By Id
    public function update_profile($name, $gender, $dob, $phone, $newImage, $id)
    {
        $sql = "UPDATE $this->table SET name = '$name', gender = '$gender', dob = '$dob', phone = '$phone',photo = '$newImage' 
        WHERE id = $id AND deleted != 0 ";
        mysqli_query($this->conn, $sql);
        return true;
    }
    public function update_password($password, $id)
    {
        $sql = "UPDATE $this->table SET password = '$password' WHERE id = '$id' AND deleted != 0 ";

        mysqli_query($this->conn, $sql);
        return  true;
    }
}
