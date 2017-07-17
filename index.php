<?php
session_start();

if(isset($_SESSION['auth'])){
	unset($_SERVER['PHP_AUTH_USER']);
	unset($_SESSION['auth']);
}

function auth() {
    if (isset($_SERVER['PHP_AUTH_USER'])) {
        if ($_SERVER['PHP_AUTH_USER'] == "admin" && $_SERVER['PHP_AUTH_PW'] == "123") {
            return true;
        }
    }
    return false;
}

while (!auth()) {
	header('WWW-Authenticate: Basic realm="Auth"'); 
	header('HTTP/1.1 401 Unauthorized');
	die('Access Denied');
	exit;
}


header('Location:http://google.az');
$_SESSION['auth'] = true;


?>