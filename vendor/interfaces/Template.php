<?php
    namespace Service\Interfaces;
    
    class Template {
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

        protected function component (string $component, array $variables = []) {
            if(class_exists($component) && method_exists($component, 'render')) {
                return (new $component(array_merge($this->variables, $variables)))->render();
            } else {
                // TODO WARN
            }
        }
    }
?>