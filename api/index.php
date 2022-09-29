<?php

require_once("../Autoloader.php");

$data = "Api is running well";

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
