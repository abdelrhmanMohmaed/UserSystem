<?php


namespace UserSystem\Classes\Models;

use UserSystem\Classes\Db;

class Admin extends Db
{
    public function __construct()
    {
        $this->table = "admin";
        $this->connect();
    }
    //admin Login function
    public function admin_login($username, $password)
    {
        $sql = "SELECT username,password FROM $this->table WHERE username = '$username'  AND password = '$password' ";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    // Count Talal No of Rows 
    public function totalCount($tablename)
    {
        $sql = "SELECT COUNT(*) AS cnt FROM $tablename";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result)["cnt"];
    }
    // Count Talal Verifite/UnVerifite Users 
    public function verified_users($status)
    {
        $sql = "SELECT COUNT(*) AS cnt FROM users WHERE verified = '$status' ";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result)["cnt"];
    }
    // Count Talal gender Users male/female Percentage
    public function genderPer()
    {
        $sql = "SELECT gender ,COUNT(*) As cnt FROM users WHERE gender != '' GROUP BY gender";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // Count Talal gender Users verified/unverified Percentage
    public function verifiedPer()
    {
        $sql = "SELECT verified ,COUNT(*) As cnt FROM users  GROUP BY verified";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // update new visitors count
    public function addCountNewVisitors()
    {
        $sql = "UPDATE visitors SET hits = hits+1 WHERE id = 0";

        mysqli_query($this->conn, $sql);
        return true;
    }
    // Count Talal Verifite/UnVerifite Users 
    public function countVisitors()
    {
        $sql = "SELECT hits FROM visitors";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result);
    }
}
