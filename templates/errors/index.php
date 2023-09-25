<?php
    namespace Templates\Errors;

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
                        <?php echo $this->error; ?>
                        <?php echo $this->status; ?>
                        <?php echo $this->request->uri; ?>
                    </main>
                </body>
                </html>
            <?php
        }
    }
?>