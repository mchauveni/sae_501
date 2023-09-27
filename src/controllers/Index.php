<?php

namespace App\Controllers;

use Service\Database\Entities;
use Service\Database\Entities\Entreprise;
use Service\Database\Entities\Entretien;
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

    private function responsable (array $user) : Response {
        return Response::template(Views\Responsable\Index::class, [
            "user" => $user,
            "title" => "Responsable Stage {$user['nom_BUT']} {$user['annee_BUT']}"
        ], 200);
    }
    
    private function etudiant(array $user): Response
    {
        $formation = new Entities\Formation();
        $formation_etud = $formation->find($user["id_formation"]);

        $debut_insc = $formation_etud["date_deb_insc"];
        $fin_insc = $formation_etud["date_fin_insc"];

        $date_dbinsc = date_create($debut_insc);
        $date_fninsc = date_create($fin_insc);
        $now = date_create('now');

        if($now->getTimestamp() < $date_dbinsc->getTimestamp()) {
            return Response::template(Views\Etudiants\tooEarly::class, [
                "user" => $user,
                "title" => "Inscription non ouvertes ({$debut_insc})",
                "date_debut" => $debut_insc,
                "date_fin" => $fin_insc,
            ]);
        } else if ($now->getTimestamp() > $date_fninsc->getTimestamp()) {
            $entretiens = new Entretien();
            $entreprises = $entretiens->getAllEntrepriseFromEtudiant($user["id_etudiant"]);
            return Response::template(Views\Etudiants\tooLate::class, [
                "user" => $user,
                "title" => "Inscription fermés ({$fin_insc})",
                "date_debut" => $debut_insc,
                "date_fin" => $fin_insc,
                "entreprises" => $entreprises
            ]);
        } else {
            $entreprise = new Entreprise();
            $entreprises = $entreprise->selectFromEtudiantFormation($user["id_formation"]);

            return Response::template(Views\Etudiants\listeEntreprise::class, [
                "user" => $user,
                "title" => "Etudiant {$user['prenom_etudiant']} {$user['nom_etudiant']}",
                "date_debut" => $debut_insc,
                "date_fin" => $fin_insc,
                "entreprises" => $entreprises
            ], 200);
        }
    }
}
