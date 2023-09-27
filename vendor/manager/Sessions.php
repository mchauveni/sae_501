<?php
    namespace Service\Manager;

    class Sessions {
        public function __construct()
        {
            session_start();
        }

        public static function destroy () {
            session_destroy();
            session_abort();
            session_start();
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