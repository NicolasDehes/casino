<?php

require_once("../Autoloader.php");

$data = [
    "result" => 1,
    "message" => "Api is running"
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
