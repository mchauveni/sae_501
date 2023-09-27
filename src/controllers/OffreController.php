<?php

namespace App\Controllers;

use Service\Database\Entities\Entreprise;
use Service\Database\Entities\Formation;
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
        $formation = (new Formation())->find($user["id_formation"]);
        $entreprise = (new Entreprise())->find($id_entreprise);

        $now = date_create('now');
        $isTooLate = $now->getTimestamp() > date_create($formation["date_fin_insc"])->getTimestamp();

        $offres = $offre->findBy([
            "id_entreprise" => $id_entreprise,
            "id_formation" => $user["id_formation"]
        ]);
        
        return Response::template(Views\Etudiants\offres::class, [
            "offres" => $offres,
            "entreprise" => $entreprise,
            "isTooLate" => $isTooLate
        ]);
    }
}