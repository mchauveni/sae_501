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
                                <h1><?php echo "{$this->user['nom_resp_stage']} {$this->user['prenom_resp_stage']}" ?></h1>
                            </div>
                            <div class="container_body">
                                <div class="general_container">
                                    <a class="btn cancel" href="/logout">Se déconnecter</a>
                                </div>
                                <div class="params_container">
                                    <span class="params_title"><b>Paramètres d'inscription</b></span>
                                    <form action="/save" method="POST">
                                        <span class="params_subtitle">Période d'inscription</span>
                                        <div class="flex_container column">
                                            <input required type="date" id="dateInscStart" name="dateStart" value="<?php echo $this->user["date_deb_insc"] ?>" hidden>
                                            <input required type="date" id="dateInscEnd" name="dateEnd" value="<?php echo $this->user["date_fin_insc"] ?>" hidden>
                                            <?php $this->component(Components\Calendar::class) ?>
                                        </div>
                                        <span class="params_subtitle">Nombre max. d'entretiens</span>
                                        <div class="flex_container">
                                            <input type="number">
                                        </div>
                                        <div class="flex_container space">
                                            <button class="btn validate" type="submit">Valider</button>
                                            <button class="btn cancel" type="reset">Restaurer</button>
                                        </div>
                                    </form>
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