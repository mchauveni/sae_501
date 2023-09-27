<?php

namespace Templates\Views\Etudiants;

use Service\Interfaces\Template;
use Components;

class tooEarly extends Template
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <link rel="stylesheet" href="public/css/pages/tooEarly.css">
            <link rel="stylesheet" href="public/css/base-ui.css">
            <?php $this->component(Components\Head::class) ?>
        </head>

        <body>
            <main>
                <header>
                    <section class="disconnect">
                        <a href="/logout">
                            <div></div>
                        </a>
                    </section>
                    <section class="user">
                        <p>Bonjour,</p>
                        <h1><?php echo "{$this->user['prenom_etudiant']} {$this->user['nom_etudiant']}"; ?></h1>
                    </section>
                    <section class="dates">
                        <p>Dates d'inscriptions :</p>
                        <p><?php echo "{$this->date_debut} - {$this->date_fin}"; ?></p>
                    </section>
                </header>


            </main>
        </body>

        </html>
<?php
    }
}
?>