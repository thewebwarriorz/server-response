<?php
/**
 * Created by PhpStorm.
 * User: Attila
 * Date: 5/06/2018
 * Time: 2:10 PM
 */

date_default_timezone_set('NZ');
require '../vendor/autoload.php';
require 'functions.php';

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$pattern = '/^\/server\/.*/mi';
preg_match_all($pattern, $request_uri[0], $matches, PREG_SET_ORDER, 0);

// If the URL is match for the /server/[server_name]
if (count($matches)) {
    // Server statistics page
    require '../views/server.php';
}

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case '/':
        require '../views/home.php';
        break;
    // Servers list page
    case '/servers/':
        require '../views/servers.php';
        break;
    // Servers list page
    case '/servers':
        require '../views/servers.php';
        break;
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require '../views/404.php';
        break;
}