<?php

namespace Templates\Views\Responsable;

use Service\Interfaces\Template;
use Components;

class listeEtudiants extends Template {
    public function render() {
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
                    <section class="return">
                        <a href="/">
                            < Retour </a>
                    </section>
                    <div class="user">
                        <span class="user__greeting">Bonjour,</span>
                        <h1><?php echo "{$this->user['nom_resp_stage']} {$this->user['prenom_resp_stage']}" ?></h1>
                        <p class="user__subtitle">Voici la liste des étudiants de la formation</p>
                    </div>
                    <div class="list_container">
                        <?php foreach($this->etudiants as $etudiant) {
                            ?>
                                <div class="list_item">
                                    <h4><?php echo "{$etudiant['nom_etudiant']} {$etudiant['prenom_etudiant']}" ?></h4>
                                    <p><?php echo $etudiant['email_etudiant'] ?></p>
                                    <p><?php echo $etudiant['tel_etudiant'] ?></p>
                                    <h3><?php echo $etudiant['nb_entretiens'] ?></h3>
                                </div>
                            <?php
                        } ?>
                    </div>
                    <div class="general_container">
                    <?php $this->component(Components\button::class, [
                                "content" => "Imprimer en PDF",
                                "icon" => "open_in_new",
                                "targetBlank" => true,
                                "target" => "/liste-etudiants?pdf"
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