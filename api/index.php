<?php

ini_set('date.timezone', 'Asia/Kolkata');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

//initialise the app
$app = new \Slim\App;

$container = $app->getContainer();


//loading app defination from different file
require 'public/login.php';
require 'public/sms.php';

//running the app
$app->run();
