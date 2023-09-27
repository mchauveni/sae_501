<?php
    namespace App\Controllers;

    use Service\Routes\Response;
    use Service\Interfaces\Controller;
use Service\Routes\Request;

    class OffreController extends Controller {
        public function offres () : Response {
            Request::getInstance()->get["formation"];
            return new Response("Hello, OffreController controller !", 200);
        }
    }
