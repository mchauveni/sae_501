<?php
    namespace App\Controllers;

    use Service\Interface\Controller;
    use Service\Routes\Response;
    use Templates;

    use App\Service\FPDF;

    class Pdf extends Controller {
        public function pdf () : string {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('helvetica','B',16);
            $pdf->Cell(40,10,'Ecrit que les boulangers c\'est vraiment des bangers !', 10, 0, 'center');
            return $pdf->Output('', 'BUT3-ETUDIANTS');
        }
    }
?>