<?php
    namespace Service\Manager;

    class Services {
        private array $env;

        public function __construct()
        {
            $this->env = array_merge(
                parse_ini_file(realpath(ROOT . "/src/config/.env"), false, INI_SCANNER_TYPED),
                parse_ini_file(realpath(ROOT . "/vendor/config/service.ini"), false, INI_SCANNER_TYPED)
            );
            
            define("SERVICE", $this);
            // set_exception_handler(fn($e) => $this->throw_error($e));
            // set_error_handler(fn(...$e) => $this->throw_error($e), E_ALL);
        }

        public function __get($name) : mixed
        {
            return $this->env[$name] ?? $this->env["DEFAULT_".$name] ?? null;
        }

        public function __set($name, $value)
        {
            
        }
    }
?>