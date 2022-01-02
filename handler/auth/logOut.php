<?php

require_once("../../app.php");

$session->remove('user');
$request->redirect("");
