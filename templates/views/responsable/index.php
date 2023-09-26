<?php
    namespace Templates\Views\Responsable;

    use Service\Interfaces\Template;
    use Components;

    class Index extends Template {
        public function render ()
        {
            ?>
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <link rel="stylesheet" href="public/css/base-ui.css">
                    <link rel="stylesheet" href="public/css/pages/responsable.css">
                    <?php $this->component(Components\Head::class) ?>
                </head>
                <body>
                    <main>
                        <div class="container">
                            <div class="container_head">
                                <span>Bonjour,</span>
                                <h1><?php echo $this->user['nom_resp_stage'] . " " . $this->user['prenom_resp_stage'] ?></h1>
                            </div>
                            <div class="container_body">
                                <div class="params_container">
                                    <span class="params_title"><b>Paramètres d'inscription</b></span>
                                    <div>
                                        <?php echo $this->user['date_deb_insc'] ?>
                                        <?php echo $this->user['date_fin_insc'] ?>
                                        <?php echo $this->user['nb_max_entretiens'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </body>
                </html>
            <?php
        }
    }
?>