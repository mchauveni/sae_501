<?php
    namespace Service\Routes;

    class Response {
        private static array $status_codes = [ 100=>'Continue', 101=>'Switching Protocols', 200=>'OK', 201=>'Created', 202=>'Accepted', 203=>'Non-Authoritative Information', 204=>'No Content', 205=>'Reset Content', 206=>'Partial Content', 300=>'Multiple Choices', 301=>'Moved Permanently', 302=>'Moved Temporarily', 303=>'See Other', 304=>'Not Modified', 305=>'Use Proxy', 400=>'Bad Request', 401=>'Unauthorized', 402=>'Payment Required', 403=>'Forbidden', 404=>'Not Found', 405=>'Method Not Allowed', 406=>'Not Acceptable', 407=>'Proxy Authentication Required', 408=>'Request Time-out', 409=>'Conflict', 410=>'Gone', 411=>'Length Required', 412=>'Precondition Failed', 413=>'Request Entity Too Large', 414=>'Request-URI Too Large', 415=>'Unsupported Media Type', 418 => "I'm a teapot", 429=>'Too Many Requests', 500=>'Internal Server Error', 501=>'Not Implemented', 502=>'Bad Gateway', 503=>'Service Unavailable', 504=>'Gateway Time-out', 505=>'HTTP Version not supported' ];

        public function __construct(mixed $response, int $status = 200)
        {
            ob_clean(); // !
            $response_status = isset(self::$status_codes[$status]) ? $status : http_response_code();
            $request = Request::getInstance();
            $options = Request::getOptionsHeaders();

            if(!str_contains($options["method"] ?? "GET", $request->method)) {
                return new ErrorResponse(405);
            }
            
            header("HTTP/1.0 " . $response_status . " " . self::$status_codes[$response_status], true, $response_status);
            header("Access-Control-Allow-Headers:X-API-KEY,Origin,X-Requested-With,Content-Type,Accept,Access-Control-Request-Method,Access-Control-Allow-Origin");
            header("Access-Control-Allow-Methods:" . ($options["method"] ?? "GET"));
            header("Access-Control-Request-Method:" . ($options["content"] ?? "GET"));
            header("Access-Control-Allow-Origin:". ($options["origin"] ?? $request->origin ?? $request->server));
            header("Content-Type:" . ($options["content-type"] ?? "text/html; charset=utf-8"));
            header("Accept:" . ($options["accept"] ?? "text/html"));

            if(isset($options["cache"])) {
                if($options["cache"] == "disable") {
                    header('Cache-Control:no-store,no-cache,must-revalidate');
                } else {
                    header('Cache-Control:' . $options["cache"]);
                }
            } else {
                header('Cache-Control:public,max-age=3600,must-revalidate');
            }

            // ? noindex, nofollow, none, noarchive, nosnippet, notranslate
            header('X-Robots-Tag:' . ($options["robots"] ?? "nofollow"));

            // ? SECURITY
            header('X-Powered-By:Mosaic');
            header('X-Content-Type-Options:' . ($options["content-type-options"] ?? "nosniff"));
            header('Strict-Transport-Security:max-age=31536000;includeSubDomains');
            header('X-XSS-Protection:1;mode=block');

            // Template
            if(is_object($response) && method_exists($response, 'render')) {
                $response = $response->render();
            } 
            // Api
            else if(is_array($response)) {
                $response["status"] = $response_status;
                $response = json_encode($response);
            }

            return die($response);
        }

        public static function getStatus (int $status) : string {
            return self::$status_codes[$status] ?? self::$status_codes[http_response_code()];
        }

        public static function template (string $template, array $variables = [], int $status = 200) : Response {
            if(class_exists($template)) {
                return new Response(new $template($variables), $status);
            } 
        }

        public static function redirect (string $url) : Response {
            header("HTTP/1.0 302 Moved Temporarily;");
            header('Cache-Control:no-store,no-cache,must-revalidate');
            header("Location: ".$url);
            return new Response("Redirected to $url", 302);
            die("Redirected to $url");
        }
    }
?>