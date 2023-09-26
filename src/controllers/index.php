<?php

namespace App\Controllers;

use Service\Database\Entities\Entreprise;
use Service\Routes\Response;
use Service\Interfaces\Controller;

use Templates;

class Index extends Controller
{
    public function index(): Response
    {
        return Response::template(Templates\Views\listeEntreprise::class, [
            "nom" => "Jean",
            "prenom" => "Bonbeurre",
            "start_date" => "12 octobre",
            "end_date" => "23 novembre",
            "entreprises" => (new Entreprise())->findBy(["id_entreprise" => 2])
        ], 200);
    }
}
