<?php
    namespace App\Controllers;

    use Service\Routes\Response;
    use Service\Interface\Controller;
    use Service\Manager\Sessions;

    class etudiantController extends Controller {
        public function index (array $user) : Response {
            Sessions::set("id_etudiant", $user["id_etudiant"]);
            Sessions::set("id_formation", $user["id_formation"]);
            Sessions::set("is_resp", $user["isResp"]);
            return new Response("Etudiant");
        }
    }
?>