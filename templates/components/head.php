<?php
    namespace Components;

    use Service\Interfaces\Component;

    class Head extends Component {
        public function render ()
        {
            ?>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
                <link rel="preload" href="/public/assets/favicon.svg" as="image" type="image/svg+xml">
                <link rel="icon" href="/public/assets/favicon.svg" type="image/svg+xml">
                <link rel="icon" href="/public/assets/favicon.png" type="image/png">
                <link rel="shortcut icon" href="/public/assets/favicon.svg" type="image/svg+xml">
                <link rel="shortcut icon" href="/public/assets/favicon.png" type="image/png">
                <link rel="stylesheet" href="/public/css/main.css">
                <script src="/public/js/utility.js" defer></script>
                <script src="/public/js/main.js" defer></script>
                <?php echo $this->head ?>
                <title><?php echo $this->title ?></title>
            <?php
        }
    }
?>