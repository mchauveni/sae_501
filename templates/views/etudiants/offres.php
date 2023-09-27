<?php
    namespace Templates\Views;

    use Service\Interfaces\Template;
    use Components;

    class offres extends Template {
        public function render ()
        {
            ?>
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <?php $this->component(Components\Head::class) ?>
                </head>
                <body>
                    <main>
                        Hello offres template !
                    </main>
                </body>
                </html>
            <?php
        }
    }
?>