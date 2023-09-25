<?php
    namespace App\Controllers;

    use Service\Interface\Controller;
    use Service\Routes\Response;
    use Templates;

    class Index extends Controller {
        public function index () : Response {
            return Response::template(Templates\Views\Index::class, [], 200);
        }

        public function api () : Response {
            return new Response([
                "hello" => "world"
            ], 200);
        }
    }
?>