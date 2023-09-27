<?php
    namespace Components;

    use Service\Interfaces\Component;

    class Calendar extends Component {
        public function render ()
        {
            ?>
                <link rel="stylesheet" href="public/css/pages/calendar-min.css">
                <script src="public/js/pages/calendar-min.js" defer></script>
                <div class="js-calendar calendar"></div>
            <?php
        }
    }
?>