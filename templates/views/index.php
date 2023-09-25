<?php
    namespace Templates\Views;

    use Service\Interface\Template;
    use Components;

    class Index extends Template {
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
                        Hello World !
                    </main>
                </body>
                </html>
            <?php
        }
    }
?>