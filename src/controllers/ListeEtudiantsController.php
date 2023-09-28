<?php

namespace App\Controllers;

use Service\Routes\Response;
use Service\Interfaces\Controller;
use Templates\Views;

use App\Service\FPDF;
use Service\Database\Entities\Formation;
use Service\Routes\ErrorResponse;

class ListeEtudiantsController extends Controller
{
    public function listeEtud(): Response
    {
        $user = $user = (new LoginController())->auth();

        if ($user["isResp"]) {
            $etudiants = (new Formation())->getAllEtudiants($user["id_formation"]);

            if(isset($this->getRequest()->get["pdf"])) {
                return $this->pdf();
            }

            return Response::template(Views\Responsable\listeEtudiants::class, [
                "etudiants" => $etudiants,
                "user" => $user
            ]);
        } else {
            return new ErrorResponse(403);
        }
    }

    public function pdf () : string {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica','B',16);
        $pdf->Cell(40,10,'Ecrit que les boulangers c\'est vraiment des bangers !', 10, 0, 'center');
        return $pdf->Output('', 'BUT3-ETUDIANTS');
    }
}
