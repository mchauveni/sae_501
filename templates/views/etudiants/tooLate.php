<?php

namespace Templates\Views\Etudiants;

use Service\Interfaces\Template;
use Components;

class tooLate extends Template
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <link rel="stylesheet" href="public/css/pages/tooLate.css">
            <link rel="stylesheet" href="public/css/base-ui.css">
            <?php $this->component(Components\Head::class) ?>
        </head>

        <body>
            <main>
            <section class="entreprises">
                    <?php
                        foreach($this->entreprises as $entreprise) {
                            ?>
                                <div>
                                    <h2><?php echo $entreprise['nom_entreprise']; ?></h2>
                                    <p><?php echo "{$entreprise['dpt_entreprise']}, {$entreprise['ville_entreprise']}"; ?></p>
                                    <?php $this->component(Components\button::class, [
                                        "content" => "Inscrit",
                                        "icon" => "event_available",
                                        "color" => "secondary"
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