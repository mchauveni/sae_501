<?php
    namespace Service\Database;

    class PDO {
        private PDO $resource;
        public function __construct()
        {
            $host = SERVICE->DB_HOST;
            $database = SERVICE->DB_NAME;
            $this->resource = new PDO("mysql:host=$host;dbname=$database", SERVICE->DB_USER, SERVICE->DB_PASS);
        }
    }
?>