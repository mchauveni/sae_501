<?php
    namespace Service\Database;

    class PDO {
        private static \PDO $resource;
        public function __construct()
        {
            $host = SERVICE->MODE == 'DEV' ? SERVICE->DB_HOST : SERVICE->DB_PROD_HOST;
            $user = SERVICE->MODE == 'DEV' ? SERVICE->DB_USER : SERVICE->DB_PROD_PASS;
            $pass = SERVICE->MODE == 'DEV' ? SERVICE->DB_USER : SERVICE->DB_PROD_PASS;

            $database = SERVICE->DB_NAME;
            self::$resource = new \PDO("mysql:host=$host;dbname=$database", $user, $pass, 
                [
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]);
        }

        public static function getInstance () : \PDO {
            return self::$resource;
        }

        public static function query(string $sql, array $attributs = null)
        {
            if ($attributs !== null) {
                $sth = self::$resource->prepare($sql);
                $sth->execute($attributs);
                return $sth;
            } else {
                return self::$resource->query($sql);
            }
        }
    }
?>