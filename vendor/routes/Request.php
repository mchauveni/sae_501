<?php
    namespace Service\Routes;

    class Request {
        public array $get;
        public array $post;
        public array $cookie;
        public array $headers;
        public array $auth;

        public array|null $session;

        public string|null $api_key;
        public string|null $authorization;

        public string|null $origin;

        public string $server;
        public string $method;
        public string $accept;
        public string $port;
        public string $protocol;
        public string $remote;
        public string $uri;
        public string $trace;

        public bool $isAjax;

        private static Request $instance;
        private static array $optionsHeaders = [];

        public static function &getInstance () : Request {
            return self::$instance;
        }

        public static function getOptionsHeaders() : array {
            return self::$optionsHeaders;
        } 

        public static function match (string|array $url, callable $controller, array $optionsHeaders) {
            if(is_array($url)) {
                foreach($url as $sub_url) {
                    self::match($sub_url, $controller, $optionsHeaders);
                } return;
            }

            if (preg_match('#^/?' . $url . '/*$#', self::$instance->uri, $arguments)) {
                array_shift($arguments);
                self::$optionsHeaders = $optionsHeaders;
                return die($controller($arguments));
            } 
        }

        public function __construct()
        {
            $this->get = $_GET;
            $this->post = array_merge($_POST, json_decode(trim(file_get_contents("php://input")), true) ?? []);
            $this->method = $_SERVER["REQUEST_METHOD"];
            $this->cookie = $_COOKIE;
            $this->session = $_SESSION ?? null;
            $this->uri = urldecode("/" . trim(str_replace(SERVICE->PATH_EXCLUDE, "", strtok($_SERVER["REQUEST_URI"], "?")), "/"));
            $this->auth = [ "USER" => $_SERVER["PHP_AUTH_USER"] ?? null, "PW" => $_SERVER["PHP_AUTH_PW"] ?? null ];
            $this->accept = $_SERVER["HTTP_ACCEPT"];
            $this->port = $_SERVER["SERVER_PORT"];
            $this->server = $_SERVER["SERVER_NAME"];
            $this->origin = $_SERVER["HTTP_ORIGIN"] ?? $_SERVER['HTTP_REFERER'] ?? null;
            $this->protocol = $_SERVER["SERVER_PROTOCOL"];
            $this->remote = $_SERVER["REMOTE_ADDR"];
            $this->headers = getallheaders();
            $this->api_key = $this->headers['X-API-Key'] ?? null;
            $this->authorization = $_SERVER['HTTP_AUTHORIZATION'] ?? null;
            $this->isAjax = isset($this->headers['X-Requested-With']) && $this->headers['X-Requested-With'] === 'XMLHttpRequest';
            
            $trace=null; if (!empty($_SERVER['HTTP_CLIENT_IP'])){ $trace=$_SERVER['HTTP_CLIENT_IP'];} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ $trace=$_SERVER['HTTP_X_FORWARDED_FOR'];} else{ $trace=$_SERVER['REMOTE_ADDR'];}
            $this->trace = $trace;
            
            self::$instance = $this;
        }
    }
?>