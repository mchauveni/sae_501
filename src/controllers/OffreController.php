<?php

namespace App\Controllers;

use Service\Routes\Response;
use Service\Interfaces\Controller;
use Templates\Views;

class OffreController extends Controller
{
    public function offres(): Response
    {
        return Response::template(Views\Etudiants\offres::class);
    }
}
