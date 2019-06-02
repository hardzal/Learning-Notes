<?php

define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "db_karyawan");

$conn = null;

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(\Exception $er) {
    echo $er->getMessage();
    exit;
}