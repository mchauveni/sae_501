<?php

namespace App\Controllers;

use Service\Routes\Response;
use Service\Interfaces\Controller;
use Templates\Views;

use App\Service\FPDF;

class ListeEtudiantsController extends Controller
{
    public function listeEtud(): Response
    {
        return Response::template(Views\Responsable\listeEtudiants::class);
    }

    public function pdf () : string {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica','B',16);
        $pdf->Cell(40,10,'Ecrit que les boulangers c\'est vraiment des bangers !', 10, 0, 'center');
        return $pdf->Output('', 'BUT3-ETUDIANTS');
    }
}
