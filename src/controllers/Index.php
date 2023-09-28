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
        // ? SAVING RESP PARAMS
        if($user["isResp"] && $this->getRequest()->method === "POST" && !empty($this->getRequest()->post)) {
            $id = $user["id_formation"];
            $dateInscEnd = $this->getRequest()->post["dateEnd"];
            $dateInscStart = $this->getRequest()->post["dateStart"];

            $nbMaxEntretiens = $this->getRequest()->post["nbMaxEntretiens"];
            if(isset($id) 
                && isset($dateInscEnd)
                && isset($dateInscStart)
                && isset($nbMaxEntretiens)) {
                $formation = new Entities\Formation();
                $formation->update($id, [
                    "date_deb_insc" => $dateInscStart,
                    "date_fin_insc" => $dateInscEnd,
                    "nb_max_entretiens" => $nbMaxEntretiens
                ]);
            }
            return Response::redirect("/");
        }
        
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

        // ! TOO SOON
        
        if($now->getTimestamp() < $date_dbinsc->getTimestamp()) {
            return Response::template(Views\Etudiants\tooEarly::class, [
                "user" => $user,
                "title" => "Inscription non ouvertes ({$debut_insc})",
                "date_debut" => $debut_insc,
                "date_fin" => $fin_insc,
            ]);
        }

        // ! GOOD TO SUB
        
        else {
            $entreprise = new Entreprise();
            $entretiens = new Entretien();

            $tooLate = $now->getTimestamp() > $date_fninsc->getTimestamp();

            if($tooLate) {
                // ? LATE: Recupere toute les entreprise où l'étudiant à un entretien
                $entreprises = $entretiens->getAllEntrepriseFromEtudiant($user["id_etudiant"]);
            } else {
                // ? Recupere toute les entreprise qui possedent au moins une offre dans la formation de l'etudiant
                $entreprises = $entreprise->selectFromEtudiantFormation($user["id_formation"]);
            }

            return Response::template(Views\Etudiants\listeEntreprise::class, [
                "user" => $user,
                "title" => "Etudiant {$user['prenom_etudiant']} {$user['nom_etudiant']}",
                "date_debut" => date_format(date_create($debut_insc),'d/m/Y'),
                "date_fin" => date_format(date_create($fin_insc),'d/m/Y'),
                "entreprises" => $entreprises,
                "tooLate" => $tooLate
            ], 200);
        }
    }
}
