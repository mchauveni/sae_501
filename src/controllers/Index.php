<?php

namespace App\Controllers;

use Service\Database\Entities;
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
        if($user["isResp"] && $this->getRequest()->method === "POST" && !empty($this->getRequest()->post)) {
            $id = $user["id_formation"];
            $dateInscEnd = $this->getRequest()->post["dateEnd"];
            $dateInscStart = $this->getRequest()->post["dateStart"];
            $nbMaxEntretiens = $this->getRequest()->post["nbMaxEntretiens"];
            if(isset($id)) {
                $formation = new Entities\Formation();
                $formation->update($id, [
                    "date_deb_insc" => $dateInscStart,
                    "date_fin_insc" => $dateInscEnd,
                    "nb_max_entretiens" => $nbMaxEntretiens
                ]);
            }
        }
        
        return Response::template(Views\Responsable\Index::class, [
            "user" => $user,
            "title" => "Responsable Stage {$user['nom_BUT']} {$user['annee_BUT']}"
        ], 200);
    }
    
    private function etudiant(array $user): Response
    {
        return Response::template(Views\Etudiants\listeEntreprise::class, [
            "user" => $user,
            "title" => "Etudiant {$user['prenom_etudiant']} {$user['nom_etudiant']}",
            "date_debut" => '09-12-2023',
            "date_fin" => '18-12-2023',
            "nom_entreprise" => 'Schneider',
            "dpt_entreprise" => 'Charente',
            "ville_entreprise" => 'Angoulême',
        ], 200);
    }
}
