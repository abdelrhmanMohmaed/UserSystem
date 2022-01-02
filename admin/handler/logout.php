<?php
require_once('../../app.php');

$session->remove('username');
$request->aredirect('');
