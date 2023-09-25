<?php
    use App\Controllers;

    Controllers\Index::bind("api", "/api", [
        "content-type" => "application/json"
    ]);

    Controllers\Index::bind("index", "/");
    
    // Controllers\Index::bind()->match("/api/(.*)", [
    //     "method" => "GET",
    //     "content-type" => "application/json"
    // ]);
?>