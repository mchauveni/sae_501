<?php

namespace App\Controllers;

use Service\Routes\Response;
use Service\Interfaces\Controller;
use Templates\Views;

class ListeEtudiantsController extends Controller
{
    public function listeEtud(): Response
    {
        return Response::template(Views\Responsable\listeEtudiants::class);
    }
}
