<?php

namespace App\Controllers;

use Service\Database\Entities\Entreprise;
use Service\Database\Entities\Entretien;
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
        $isTooSoon = $now->getTimestamp() < date_create($formation["date_deb_insc"])->getTimestamp();

        $limitReach = false;

        if(!$isTooLate && !$isTooSoon && !empty($this->getRequest()->get)) {
            $req = $this->getRequest()->get;
            $entretien = new Entretien();
            if(isset($req["subscribe"])){
                $limit = $formation["nb_max_entretiens"];
                if(count($entretien->findBy([
                    "id_etudiant" => $user["id_etudiant"]
                ])) < $limit) {
                    if(empty($entretien->findBy([
                        "id_entreprise" => $id_entreprise, 
                        "id_etudiant" => $user["id_etudiant"]
                    ]))) {
                        $entretien->create([
                            "id_entreprise" => $id_entreprise, 
                            "id_etudiant" => $user["id_etudiant"]
                        ]);  
                    }
                } else {
                    $limitReach = $limit;
                }
            } else if(isset($req["unsubscribe"])){
                $del = $entretien->findBy([
                    "id_entreprise" => $id_entreprise, 
                    "id_etudiant" => $user["id_etudiant"]
                ]);
                if(isset($del[0])) {
                    $entretien->delete($del[0]["id_entretien"]);
                }
            }
        }

        $offres = $offre->findBy([
            "id_entreprise" => $id_entreprise,
            "id_formation" => $user["id_formation"]
        ]);

        $isSubscribed = !empty((new Entretien())->findBy([
            "id_entreprise" => $id_entreprise,
            "id_etudiant" => $user["id_etudiant"]
        ]));

        return Response::template(Views\Etudiants\offres::class, [
            "title" => "Offres de stage | {$entreprise['nom_entreprise']}",
            "offres" => $offres,
            "entreprise" => $entreprise,
            "isTooLate" => $isTooLate,
            "isSubscribed" => $isSubscribed,
            "inscLimit" => $limitReach
        ]);
    }
}