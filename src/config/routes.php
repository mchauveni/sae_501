<?php

use App\Controllers;

Controllers\LoginController::bind("login", "/login", [
    "method" => "GET, POST",
]);

Controllers\Index::bind("index", "/");
