<?php

// @session_start();
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('168168959977-m1rac8stn4m7dsg3ngrekvqoqdoek3ta.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('j9yaTLJJNp7AcMZIOTBiY7MK');

// $google_client->setCleientId('168168959977-m1rac8stn4m7dsg3ngrekvqoqdoek3ta.apps.googleusercontent.com');

// $google_client->setClientSecret('j9yaTLJJNp7AcMZIOTBiY7MK');


//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/portfolio/google/getgoogleinfo.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page

?>