<?php

namespace UserSystem\Classes;

class Request
{
    public function getAll()
    {
        return $_GET;
    }

    public function postAll()
    {
        return $_POST;
    }

    public function get(string $key)
    {
        return $_GET[$key];
    }

    public function post(string $key)
    {
        return $_POST[$key];
    }

    public function getHas(string $key)
    {
        return isset($_GET[$key]);
    }

    public function postHas(string $key)
    {
        return isset($_POST[$key]);
    }

    public function files(string $key)
    {
        return $_FILES[$key];
    }

    public function fileHas(string $key)
    {
        return isset($_FILES[$key]);
    }
    // redirect to index location 
    public function redirect($path)
    {
        header("location: " . URL . $path);
    }   
    // redirect to index Admin location 
    public function aredirect($path)
    {
        header("location: " . AURL . $path);
    }
}
