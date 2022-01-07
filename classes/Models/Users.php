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
    // fetch All Users deleted or not deleted
    public function fetchAllUsers($val)
    {
        $sql = "SELECT * FROM $this->table WHERE deleted != '$val'";

        $result = mysqli_query($this->conn, $sql);
        return  mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // fetch all users Details 
    public function fetchAllUserDetails($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = '$id' AND deleted != 0";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    // user Action  
    public function userAction($id, $val)
    {
        $sql = "UPDATE $this->table SET deleted = '$val' WHERE id = '$id'";

        mysqli_query($this->conn, $sql);
        return  true;
    }
    // update By Id
    public function update_profile($name, $gender, $dob, $phone, $newImage, $id)
    {
        $sql = "UPDATE $this->table SET name = '$name', gender = '$gender', dob = '$dob', phone = '$phone',photo = '$newImage' 
        WHERE id = $id AND deleted != 0 ";
        mysqli_query($this->conn, $sql);
        return true;
    }
    // Update password 
    public function update_password($password, $id)
    {
        $sql = "UPDATE $this->table SET password = '$password' WHERE id = '$id' AND deleted != 0 ";

        mysqli_query($this->conn, $sql);
        return  true;
    }


}
