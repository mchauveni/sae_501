<?php

namespace Templates\Views\Responsable;

use Service\Interfaces\Template;
use Components;

class listeEtudiants extends Template
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
        <link rel="stylesheet" href="public/css/base-ui.css">
            <link rel="stylesheet" href="public/css/pages/listeEtud.css">
            <?php $this->component(Components\Head::class) ?>
        </head>

        <body>
            <main>
                <div class="container">
                    <div class="container_head">
                        <span>Bonjour,</span>
                        <h1>Prenom Nom</h1>
                        <p>Voici la liste des étudiants de la formation</p>
                    </div>
                    <div class="list_container">
                        <div class="list_item">
                            <h4>Smirnov Ilya</h4>
                            <p>ismirnov@etu.univ-poitiers.fr</p>
                            <p>06 34 75 25 45</p>
                            <h3>3 entretiens</h3>
                        </div>
                        <div class="list_item">
                            <h4>Smirnov Ilya</h4>
                            <p>ismirnov@etu.univ-poitiers.fr</p>
                            <p>06 34 75 25 45</p>
                            <h3>15 entretiens</h3>
                        </div>
                        <div class="list_item">
                            <h4>Smirnov Ilya</h4>
                            <p>ismirnov@etu.univ-poitiers.fr</p>
                            <p>06 34 75 25 45</p>
                            <h3>0 entretiens</h3>
                        </div>
                    </div>
                    <div class="general_container">
                    <?php $this->component(Components\button::class, [
                                "content" => "Imprimer en PDF",
                                "icon" => "open_in_new",
                                "target" => "/liste-etudiants"
                            ]); ?>
                    </div>
                </div>
            </main>
        </body>

        </html>
<?php
    }
}
?>