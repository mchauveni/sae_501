<?php

namespace App\Controllers;

use Service\Database\Entities\Entreprise;
use Service\Database\Entities\Offre;
use Service\Routes\Response;
use Service\Interfaces\Controller;
use Templates\Views;

class OffreController extends Controller
{
    public function offres(int $id_entreprise): Response
    {
        $user = (new LoginController())->auth();
        $offre = new Offre();
        $entreprise = (new Entreprise())->find($id_entreprise);

        $offres = $offre->findBy([
            "id_entreprise" => $id_entreprise,
            "id_formation" => $user["id_formation"]
        ]);
        
        return Response::template(Views\Etudiants\offres::class, [
            "offres" => $offres,
            "entreprise" => $entreprise
        ]);
    }
}