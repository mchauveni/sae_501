<?php
    // *   __    __  ______  ______  ______  __  ______   
    // *  /\ '-./  \/\  __ \/\  ___\/\  __ \/\ \/\  ___\  
    // *  \ \ \-./\ \ \ \/\ \ \___  \ \ \_\ \ \ \ \ \____ 
    // *   \ \_\ \ \_\ \_____\/\_____\ \_\ \_\ \_\ \_____\
    // *    \/_/  \/_/\/_____/\/_____/\/_/\/_/\/_/\/_____/
    // *    

    // * Mosaic PHP Framework | Created with ♡ (at least)
    // * https://maksance.dev/mosaic

    define("ROOT", dirname(__DIR__, 1));
    
    require_once realpath(ROOT . "/vendor/config/autoload.php");

    use Service\Routes\Request;
    use Service\Routes\ErrorResponse;
    
    use Service\Manager\Services;
    use Service\Manager\Resources;
    use Service\Manager\Sessions;
    use Service\Database\PDO;
    
    new Services();
    new Sessions();
    new PDO();

    new Request();
    new Resources();

    // * Make sure to require routes globaly
    require_once realpath(ROOT . "/src/config/routes.php");

    // ? No routes have matched the current URI, returning 404
    return new ErrorResponse(404);
?>