<?php 
require_once 'sso_handler.php';

$CLIENT_ID = ""; //TODO: Enter CLIENT_ID
$CLIENT_SECRET = ""; //TODO: Enter CLIENT_SECRET

global $sso_handler;
$sso_handler = new SSOHandler($CLIENT_ID, $CLIENT_SECRET)
?>