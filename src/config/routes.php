<?php

use App\Controllers;

Controllers\LoginController::bind("login", "/login", [
    "method" => "GET, POST"
]);

Controllers\Index::bind("index", "/", [
    "method" => "GET, POST"
]);

Controllers\OffreController::bind("offres", "/offres/(\\d+)");

Controllers\LoginController::bind("logout", "/logout", [
    "method" => "GET", 
]);
