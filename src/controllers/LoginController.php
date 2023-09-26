<?php
    namespace App\Controllers;

    use Service\Routes\Response;
    use Service\Interfaces\Controller;

    use Service\Database\Entities\Auth;
    use Service\Manager\Sessions;
    use Service\Plugins\HashPassword;

    use Templates;

    class LoginController extends Controller {
        public function login () : Response {
            $rAuth = $this->auth();

            if($this->getRequest()->method === "POST" && !empty($this->getRequest()->post)) {
                Sessions::set("email", $rAuth["email"]);
                Sessions::set("password", $rAuth["password"]);
                Response::redirect("/");
            }

            return Response::redirect("/");
        }

        public function auth () : ?array {
            $auth = new Auth();

            $email = Sessions::get("email") ?? $this->getRequest()->post["email"] ?? "";
            $password = Sessions::get("password") ?? (new HashPassword($this->getRequest()->post["password"] ?? ""))->getHash();

            $authentification = $auth->auth($email, $password);

            if(isset($authentification["error"])) {
                return Response::template(Templates\Views\Login::class, [
                    "title" => "Se connecter",
                    "error" => $authentification["error"],
                    "email" => $authentification["error"] === "password" ? $email : null
                ], 200);
            } else {
                return $authentification;
            }
        }
    }
