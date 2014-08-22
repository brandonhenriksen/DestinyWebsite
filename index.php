<?php

require 'vendor/autoload.php';
use Slim\Slim;

$app = new Slim();
include __DIR__ . "/database.php";
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$app->get('/', function() use ($app, $db){
    include 'pages/snippets/header.php';
    include 'pages/home.php';
    include 'pages/snippets/footer.php';
})->name('home');

$app->get('/signup', function() use ($app, $db){
    include 'pages/snippets/header.php';
    include 'pages/signup.php';
    include 'pages/snippets/footer.php';
})->name('signup');

$app->post('/api/addUser', function() use ($app, $db){
    include 'api/addUser.php';
})->name('addUser');

$app->run();