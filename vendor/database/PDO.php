<?php
    namespace Service\Database;

    class PDO {
        private static \PDO $resource;
        public function __construct()
        {
            $host = SERVICE->DB_HOST;
            $database = SERVICE->DB_NAME;
            self::$resource = new \PDO("mysql:host=$host;dbname=$database", SERVICE->DB_USER, SERVICE->DB_PASS, 
                [
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
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