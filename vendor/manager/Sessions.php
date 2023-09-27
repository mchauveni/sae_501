<?php
    namespace Service\Manager;

    class Sessions {
        public function __construct()
        {
            session_start();
        }

        public static function destroy () {
            $_SESSION = array();
            session_destroy();
            session_unset();
        }

        public static function set (string $name, mixed $value) : bool {
            if(session_status() === PHP_SESSION_ACTIVE) {
                $_SESSION[$name] = $value;
                return true;
            } else {
                return false;
            }
        }

        public static function get (string $name) : mixed {
            if(session_status() === PHP_SESSION_ACTIVE) {
               return $_SESSION[$name] ?? null;
            } else {
                return null;
            }
        }
    }
?>