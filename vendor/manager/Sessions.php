<?php
    namespace Service\Manager;

    class Sessions {
        public function __construct()
        {
            session_start();
        }

        public static function destroy () {
            if(empty($_SESSION)) {
                session_start();
            }
            $_SESSION = [];
            session_unset();
            session_destroy();
        }

        public static function set (string $name, mixed $value) : bool {
            if(session_status() !== PHP_SESSION_NONE && session_status() !== PHP_SESSION_DISABLED) {
                $_SESSION[$name] = $value;
                return true;
            } else {
                return false;
            }
        }

        public static function get (string $name) : mixed {
            if(session_status() !== PHP_SESSION_NONE && session_status() !== PHP_SESSION_DISABLED) {
               return $_SESSION[$name] ?? null;
            }
        }
    }
?>