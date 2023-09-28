<?php

namespace Templates\Views\Etudiants;

use Service\Interfaces\Template;
use Components;

class offres extends Template {
    public function render() {
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
                        <?php $this->component(Components\Button::class, [
                            "content" => "Retour",
                            "icon" => "chevron-reverse",
                            "iconBeforeText" => true,
                            "target" => "/",
                            "color" => "dark"
                        ]) ?>
                    </section>
                    <section class="entreprise">
                        <h1 class="entreprise__name"><?php echo $this->entreprise["nom_entreprise"] ?></h1>
                        <p class="entreprise__localisation"><?php echo "{$this->entreprise['dpt_entreprise']}, {$this->entreprise['ville_entreprise']}" ?></p>
                    </section>
                    <?php
                    if ($this->inscLimit !== false) {
                    ?>
                        <span class="offre_error_max">Vous avez déjà atteint la limite maximum d'entretiens (<?php echo $this->inscLimit ?>)</span>
                    <?php
                    }
                    ?>
                </header>
                <section class="offres">
                    <?php
                    foreach ($this->offres as $offre) {
                    ?>
                        <div class="offre">
                            <h2 class="offre_ref"><?php echo $offre["ref_offre"] ?></h2>
                            <p class="offre__comment"><?php echo $offre["commentaires"] ?></p>
                            <?php $this->component(Components\Button::class, [
                                "content" => "Voir l'offre",
                                "icon" => "open_in_new",
                                "target" => "/placeholder/pdf?file={$offre["fichier_offre"]}&title={$offre["ref_offre"]}&comm={$offre["commentaires"]}",
                                "targetBlank" => true
                            ]) ?>
                        </div>
                    <?php
                    }
                    ?>
                </section>
                <footer>
                    <?php
                    if (!$this->isSubscribed && !$this->isTooLate) {
                        $this->component(Components\Button::class, [
                            "content" => "Je postule",
                            "color" => "secondary",
                            "icon" => "postuler",
                            "iconBeforeText" => true,
                            "target" => "/offres/{$this->entreprise['id_entreprise']}?subscribe"
                        ]);
                    } else if ($this->isSubscribed && !$this->isTooLate) {
                        $this->component(Components\Button::class, [
                            "content" => "J'abandonne",
                            "color" => "danger",
                            "icon" => "delete",
                            "iconBeforeText" => true,
                            "target" => "/offres/{$this->entreprise['id_entreprise']}?unsubscribe"
                        ]);
                    }
                    ?>
                </footer>
            </main>
        </body>

        </html>
<?php
    }
}
?>