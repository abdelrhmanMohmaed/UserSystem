<?php

namespace UserSystem\Classes;

abstract class Db
{
    const  USERNAME = "abc@gmail.com";
    const  PASSWORD = "jhbvkjsdbvkl";

    protected $conn;
    protected $table;
    //connect in DB
    public function connect()
    {
        $this->conn = mysqli_connect(DB_SERVERNAME, "root", "", "db-user-system");
    }
    // select All data 
    public function selectAll(string $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // show email in db
    public function user_exist($email)
    {
        $sql = "SELECT email FROM $this->table WHERE email = '$email' ";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }
    //check email register
    public function login($email)
    {
        $sql = "SELECT email,password FROM $this->table WHERE email = '$email'  AND deleted != 0";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    //insert data
    public function insert(string $fields, string $values)
    {
        $sql = "INSERT INTO  $this->table ($fields) VALUES ($values)";

        mysqli_query($this->conn, $sql);
        return true;
    }

    // select all Data By Email
    public function select_email($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email = '$email'  AND deleted != 0";

        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function forgotPassword($token, $email)
    {
        $sql = "UPDATE $this->table SET token = '$token' , token_expire = DATE_ADD(NOW(),
        INTERVAL 10 MINUTE) WHERE email = '$email'";
        mysqli_query($this->conn, $sql);

        return true;
    }
    // delete
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        mysqli_query($this->conn, $sql);
        return true;
    }
}
