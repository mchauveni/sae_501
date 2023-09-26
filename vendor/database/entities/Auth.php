<?php
    namespace Service\Database\Entities;

    use Service\Database\PDO;

    class Auth {
        public static function auth (string $email, string $password) : ?array {
            $etudiant = new Etudiant();
            $formation = new Formation();

            $select = $etudiant->findBy([
                "email_etudiant" => $email
            ]);

            if(!$select) {
                $select = $formation->findBy([
                    "email_resp_stage" => $email
                ]); 
            }

            if(!$select) {
                return [ "error" => "email" ];
            } else {
                $select = $select[0];
                $select["password"] = $select["mp_etudiant"] ?? $select["mp_resp_stage"] ?? null;
                $select["email"] = $select["email_etudiant"] ?? $select["email_resp_stage"] ?? null;
                $select["isResp"] = !isset($select["email_etudiant"]);
                if($select["password"] === $password) {
                    return $select;
                } else {
                    return [ "error" => "password" ];
                }
            }
        }
    }
?>