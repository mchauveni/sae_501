<?php

namespace Templates\Views\Etudiants;

use Service\Interfaces\Template;
use Components;

class listeEntreprise extends Template
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <link rel="stylesheet" href="public/css/pages/listeEntreprise.css">
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

                <section class="entreprises">
                    <?php
                        foreach($this->entreprises as $entreprise) {
                            ?>
                                <div>
                                    <h2><?php echo $entreprise['nom_entreprise']; ?></h2>
                                    <p><?php echo "{$entreprise['dpt_entreprise']}, {$entreprise['ville_entreprise']}"; ?></p>
                                    <?php $this->component(Components\button::class, [
                                        "content" => "Voir les offres",
                                        "icon" => "chevron",
                                        "target" => "/offres/{$entreprise['id_entreprise']}"
                                    ]); ?>
                                </div>
                            <?php
                        }
                    ?>
                </section>

            </main>
        </body>
        </html>
    <?php
        }
    }
?>