<?php
    namespace Components;

    use Service\Interfaces\Component;

    class button extends Component {
        public function render ()
        {
            ?>
                <div class="btn <?php echo $this->color ?>">
                    <span><?php echo $this->content ?></span>
                    <div class="icon">
                        <?php echo file_get_contents(realpath(ROOT . "/public/resources/assets/icons/" . $this->icon . ".svg")) ?>
                    </div>
                </div>
            <?php
        }
    }
?>