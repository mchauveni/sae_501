<?php
    spl_autoload_register(function($class) {
        $parts = explode("\\", $class);
        $file = array_pop($parts);
        $dest = array_shift($parts);

        $destination = [
            "App" => "/src",
            "Templates" => "/templates",
            "Components" => "/templates/components",
            "Service" => "/vendor"
        ][$dest];

        $folders = empty($parts) ? "" : strtolower(implode("/", $parts)) . "/";

        $path = realpath(ROOT . $destination . "/" . $folders . $file . ".php");

        if(file_exists($path)) {
            return require_once $path;
        } else {
            $lowercase_path = realpath(ROOT . $destination . "/" . $folders . strtolower($file) . ".php");
            if(file_exists($lowercase_path)) {
                return require_once $lowercase_path;
            } else {
                return false;
            }
        }
    });
?>