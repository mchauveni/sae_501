<?php

namespace Templates\Views\Responsable;

use Service\Interfaces\Template;
use Components;

class listeEtudiants extends Template
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <?php $this->component(Components\Head::class) ?>
        </head>

        <body>
            <main>
                Hello listeEtudiants template !
            </main>
        </body>

        </html>
<?php
    }
}
?>