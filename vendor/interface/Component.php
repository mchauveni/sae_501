<?php
    namespace Service\Interface;

    class Component {
        protected array $variables;

        public function __construct(array $variables)
        {
            $this->variables = $variables;
        }

        public function __get(string $name)
        {
            if(isset($this->variables[$name])) {
                return $this->variables[$name];
            } else {
                return null;
            }
        }
    }
?>