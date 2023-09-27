<?php
    namespace Components;

    use Service\Interfaces\Component;

    class button extends Component {
        public function render ()
        { 
            ?>
                <a href="<?php echo $this->target ?>" class="btn <?php echo $this->color ?? "main" ?> <?php echo $this->iconBeforeText ? " iconBeforeText" : "" ?>">
                    <span><?php echo $this->content ?></span>
                    <div class="icon">
                        <?php 
                            $path = ROOT . "/public/resources/assets/icons/" . $this->icon . ".svg";
                            $default = realpath(ROOT . "/public/resources/assets/icons/flaggerbasted.svg");
                            echo file_get_contents(file_exists($path) ? realpath($path) : realpath($default));
                         ?>
                    </div>
                </a>
            <?php
        }
    }
?>