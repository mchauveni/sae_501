<?php
    namespace Service\Manager;

    use Service\Routes\Request;

    class Resources {
        public function __construct()
        {
            $request = Request::getInstance()->uri;
            
            if(str_starts_with($request, "/" . SERVICE->PUBLIC_PATH . "/")) {
                $path = realpath(ROOT . "/public/resources" . str_replace("/" . SERVICE->PUBLIC_PATH, "", $request));
                $this->get_file($path);
            }

            // if(str_starts_with($request, "/public/") ||
            //     ) {
            //     $path = APP_ROOT . "/resources" . $request;
            //     $this->resource_file($path);
            // } else if(str_starts_with($request, "private")) {
            //     // TODO PRIVATE ACCESS
            // } else if(str_starts_with($request, "vendor")) {
            //     // TODO VENDOR ACCESS
            // }
        }

        private function get_file (string $path) {
            header('Cache-Control:public,max-age=172800');
            header('X-Powered-By:Mosaic');
            if(file_exists($path) && !is_dir($path)) {
                header("HTTP/1.0 200 OK", true, 200);
                header('X-Content-Type-Options:nosniff');
                $extension = pathinfo($path, PATHINFO_EXTENSION); 
                if($extension === "css") {
                    header("Content-type: text/css");
                } else if($extension === "js") {
                    header("Content-type: text/javascript");
                } else {
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime = finfo_file($finfo, $path);
                    finfo_close($finfo);
                    header("Content-type: $mime");
                }
                readfile($path);
                return die(null);
            } else {
                header("HTTP/1.0 404 Not Found", true, 404);
                return die(null);
            }
        }
    }
?>