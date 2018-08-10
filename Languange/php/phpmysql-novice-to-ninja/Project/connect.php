<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=firstdb;charset=utf8', 'root', '');
    $output = 'Database connection established';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = '';
    $pdo->exec($sql);

    $output = 'Joke table successfully created!';
    $pdo = null;
} catch(PDOException $err) {
    $output = "Unable to connect database server ". $err->getMessage(). " in ". $err->getFile(). " : ". $err->getLine();
}

include_once '../templates/output.html.php';