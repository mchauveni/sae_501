<?php

namespace Templates\Views;

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
                        <h1><?php echo "{$this->prenom} {$this->nom}"; ?></h1>
                    </section>
                    <section class="dates">
                        <p>Dates d'inscriptions :</p>
                        <p><?php echo "{$this->start_date} - {$this->end_date}"; ?></p>
                    </section>
                </header>

                <section class="entreprises">
                    <?php foreach ($this->entreprises as $entreprise) {
                    ?>
                        <h2><?php echo $entreprise['nom_entreprise'] ?></h2>
                        <p><?php echo "{$entreprise['dpt_entreprise']}, {$entreprise['ville_entreprise']}" ?></p>
                        <a href="">Voir les offres > </a>
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