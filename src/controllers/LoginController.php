<?php
    namespace App\Controllers;

    use Service\Routes\Response;
    use Service\Interfaces\Controller;

    use Service\Database\Entities;
    use Service\Plugins\HashPassword;

    use Templates;

    class LoginController extends Controller {
        public function login () : Response {
            if($this->getRequest()->method === "POST" && !empty($this->getRequest()->post)) {
                // return $this->postLogin();
            }

            return Response::template(Templates\Views\Login::class, [
                "title" => "Se connecter"
            ], 200);
        }

        private function postLogin () : Response {
            $etudiants = new Entities\Etudiant();
            $formation = new Entities\Formation();

            $user = $etudiants->findBy([
                "email_etudiant" => $this->getRequest()->post["email"]
            ])[0] ?? $formation->findBy([
                "email_resp_stage" => $this->getRequest()->post["email"]
            ])[0];

            $password = $user["mp_etudiant"] ?? $user["mp_resp_stage"] ?? null;

            $validPassword = isset($password) && $password === (new HashPassword(
                $this->getRequest()->post["password"]
            ))->getHash();

            $user["isResp"] = isset($user["id_resp_stage"]);

            if($user !== null && $validPassword) {
                // return $user["isResp"] ? 
                //     (new etudiantController())->index($user) :
                //     (new stageRespController())->index($user);
            } else {
                return Response::template(Templates\Views\Login::class, [
                    "title" => "Se connecter",
                    "userError" => $user == null,
                    "passwordError" => !$validPassword,
                ], 200);
            }
        }
    }
