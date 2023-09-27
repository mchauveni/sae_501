<?php

namespace App\Controllers;

use Service\Routes\Response;
use Service\Interfaces\Controller;

use Templates\Views;

class Index extends Controller
{
    public function index(array $user = []): Response
    {
        if (empty($user)) {
            $user = (new LoginController())->auth();
        }

        if ($user["isResp"]) {
            return $this->responsable($user);
        } else {
            return $this->etudiant($user);
        }
    }

    private function responsable(array $user): Response
    {
        return Response::template(Views\Responsable\Index::class, [
            "user" => $user
        ], 200);
    }

    private function etudiant(array $user): Response
    {
        return Response::template(Views\Etudiants\listeEntreprise::class, [
            "user" => $user,
            "date_debut" => '09-12-2023',
            "date_fin" => '18-12-2023',
            "nom_entreprise" => 'Schneider',
            "dpt_entreprise" => 'Charente',
            "ville_entreprise" => 'Angoulême',
        ], 200);
    }
}
