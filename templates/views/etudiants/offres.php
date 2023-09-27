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
            <link rel="stylesheet" href="public/css/pages/offres.css">
            <link rel="stylesheet" href="public/css/base-ui.css">
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
                        <h1>Schneider</h1>
                        <p>Charente, Angoulême</p>
                    </section>
                </header>



                <section class="offres">
                    <div>
                        <h2>MMI3_offre1</h2>
                        <p>commentaire de l'offre de stage de l'entreprise.</p>
                        <a download="" class="btn">Consulter l'offre</a>
                    </div>
                    <div>
                        <h2>MMI3_offre2</h2>
                        <p>commentaire de l'offre de stage de l'entreprise.</p>
                        <a download="" class="btn">Consulter l'offre</a>
                    </div>
                    <div>
                        <h2>MMI3_offre3</h2>
                        <p>commentaire de l'offre de stage de l'entreprise.</p>
                        <a download="" class="btn">Consulter l'offre</a>
                    </div>
                    <div>
                        <h2>MMI3_offre4</h2>
                        <p>commentaire de l'offre de stage de l'entreprise.</p>
                        <a download="" class="btn">Consulter l'offre</a>
                    </div>
                    <div>
                        <h2>MMI3_offre5</h2>
                        <p>commentaire de l'offre de stage de l'entreprise.</p>
                        <a download="" class="btn">Consulter l'offre</a>
                    </div>
                    <div>
                        <h2>MMI3_offre6</h2>
                        <p>commentaire de l'offre de stage de l'entreprise.</p>
                        <a download="" class="btn">Consulter l'offre</a>
                    </div>
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