<?php
    namespace Service\Routes;

    use Service\Routes\Request;
    use Service\Routes\Response;
    use Templates\Errors;

    class ErrorResponse {
        public function __construct(int $status)
        {
            if($status < 202) $status = 400;

            header("X-Robots-Tag: noindex");
            $request = Request::getInstance();
            $options = Request::getOptionsHeaders();
            $error = Response::getStatus($status);
            
            // ? JSON Error if content-type is JSON
            if($request->accept === "application/json" || (isset($options["content-type"])
              && $options["content-type"] === "application/json")) {
                return new Response([
                    "status" => $status,
                    "error" => $error,
                    "request" => $request->uri
                ], $status);
            } else {
                if(class_exists(("Templates\\Errors\\_$status\\Index"))) {
                    $template = ("Templates\\Errors\\_$status\\Index");
                } else if (class_exists(Errors\Index::class)) {
                    $template = Errors\Index::class;
                } else {
                    $r = $request->uri;
                    return die("$error $status ($r)");
                }
                return Response::template($template, [
                    "status" => $status,
                    "error" => $error,
                    "request" => $request
                ], $status);
            }
        }
    }
?>