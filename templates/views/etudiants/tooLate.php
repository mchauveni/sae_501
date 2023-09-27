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
                Hello tooLate template !
            </main>
        </body>

        </html>
<?php
    }
}
?>