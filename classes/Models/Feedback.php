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
}
