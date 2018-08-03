<?php

require_once('db.php');

function checkGETParametersOrDie($parameters) {
	foreach($parameters as $parameter) {
		isset($_GET[$parameter]) || die("'$parameter' parameter must be set by GET method.");
	}
}

checkGETParametersOrDie(['username', 'password']);

$username = $_GET['username'];
$password = $_GET['password'];

$db = new DB();
$db->createUser($username, $password);

