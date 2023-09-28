<?php
    namespace App\Controllers;

    use Service\Routes\Response;
    use Service\Interfaces\Controller;

    use App\Service\FPDF;

    class PlaceHolder extends Controller {
        public function pdf () : string {
            $req = $this->getRequest()->get;
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->AcceptPageBreak();
            $pdf->SetFont('helvetica','I',12);
            $pdf->Cell(0,10, $req["file"] ?? "fichier_offre.pdf", 10, 0, 'center');
            $pdf->Ln(12);
            $pdf->SetFont('helvetica','B',18);
            $pdf->Cell(0,10, $req["title"] ?? "Placeholder PDF", 10, 0, 'center');
            $pdf->Ln(12);
            $pdf->Image("https://www.education.gouv.fr/sites/default/files/styles/banner_1340x730/public/2020-02/le-stage-de-3e-016-dem0557746-43430.jpg?itok=248KwrWB",
            null, null, -200, 0, "jpg");
            $pdf->SetFont('helvetica','',16);
            $pdf->Cell(0,10, $req["comm"] ?? "Commentaires de l'offre", 10, 0, 'center');
            return $pdf->Output('I', $req["title"] ?? "Placeholder PDF", true);
        }
    }
?>