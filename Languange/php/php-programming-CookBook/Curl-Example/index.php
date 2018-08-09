<?php

require_once("curl_class.php");

try {
    $curl = new CURL();

    
    $curl->configure('webcodegeeks.com');
    $response1 = $curl->execute();

    $curl->configure('webcodegeeks.com', ['s' => 'php'], 'GET');
    $response2 = $curl->execute();
    
    $curl->close();
} catch(Exception $err) {
    die("An exception has been thrown: ". $err->getMessage());
}
