<?php

namespace Templates\Views\Etudiants;

use Service\Interfaces\Template;
use Components;

class offres extends Template
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <link rel="stylesheet" href="/public/css/pages/offres.css">
            <link rel="stylesheet" href="/public/css/base-ui.css">
            <?php $this->component(Components\Head::class) ?>
        </head>

        <body>
            <main>
                <header>
                    <section class="return">
                        <a href="/">
                            < Retour </a>
                    </section>
                    <section class="entreprise">
                        <h1><?php echo $this->entreprise["nom_entreprise"] ?></h1>
                        <p><?php echo "{$this->entreprise['dpt_entreprise']}, {$this->entreprise['ville_entreprise']}" ?></p>
                    </section>
                </header>
                <section class="offres">
                    <?php
                        foreach($this->offres as $offre) {
                            ?>
                                <div>
                                    <h2><?php echo $offre["ref_offre"] ?></h2>
                                    <p><?php echo $offre["commentaires"] ?></p>
                                    <?php $this->component(Components\Button::class, [
                                        "content" => "Voir l'offre",
                                        "icon" => "open_in_new",
                                        "target" => "/public/upload/{$offre["fichier_offre"]}",
                                        "targetBlank" => true
                                    ]) ?>
                                </div>
                            <?php
                        }
                    ?>
                </section>
                <footer>
                    <a href="" class="btn">S'inscrire à l'entretien</a>
                </footer>
            </main>
        </body>

        </html>
<?php
    }
}
?>