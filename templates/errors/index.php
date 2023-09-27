<?php
    namespace Templates\Errors;

    use Service\Interfaces\Template;
    use Components;

    class Index extends Template {
        public function render ()
        {
            ?>
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <link rel="stylesheet" href="public/css/pages/error.css">
                    <?php $this->component(Components\Head::class, [
                        "title" => $this->status . " | " . $this->error
                    ]) ?>
                </head>
                <body>
                    <main>
                        <div>
                            <h1><?php echo $this->status; ?></h1>
                            <h2><span><?php echo $this->request->uri; ?></span> <?php echo $this->error ?></h2>
                            <a href="/">Retour à l'accueil</a>
                        </div>
                    </main>
                </body>
                </html>
            <?php
        }
    }
?>