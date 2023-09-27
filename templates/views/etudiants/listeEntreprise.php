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
            <?php $this->component(Components\Head::class) ?>
        </head>

        <body>
            <main>
                <header>
                    <section class="disconnect">
                        <a href="">
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
                    <div>
                        <h2><?php echo $this->nom_entreprise ?></h2>
                        <p><?php echo "{$this->dpt_entreprise}, {$this->ville_entreprise}" ?></p>
                        <a href="">Voir les offres > </a>
                    </div>
                    <div>
                        <h2><?php echo $this->nom_entreprise ?></h2>
                        <p><?php echo "{$this->dpt_entreprise}, {$this->ville_entreprise}" ?></p>
                        <a href="">Voir les offres > </a>
                    </div>
                    <div>
                        <h2><?php echo $this->nom_entreprise ?></h2>
                        <p><?php echo "{$this->dpt_entreprise}, {$this->ville_entreprise}" ?></p>
                        <a href="">Voir les offres > </a>
                    </div>
                    <div>
                        <h2><?php echo $this->nom_entreprise ?></h2>
                        <p><?php echo "{$this->dpt_entreprise}, {$this->ville_entreprise}" ?></p>
                        <a href="">Voir les offres > </a>
                    </div>
                    <div>
                        <h2><?php echo $this->nom_entreprise ?></h2>
                        <p><?php echo "{$this->dpt_entreprise}, {$this->ville_entreprise}" ?></p>
                        <a href="">Voir les offres > </a>
                    </div>
                    <div>
                        <h2><?php echo $this->nom_entreprise ?></h2>
                        <p><?php echo "{$this->dpt_entreprise}, {$this->ville_entreprise}" ?></p>
                        <a href="">Voir les offres > </a>
                    </div>

                </section>

            </main>
        </body>

        </html>
<?php
    }
}
?>