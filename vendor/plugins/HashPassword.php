<?php
    namespace Service\Plugins;

    class HashPassword {
        private string $hash;
        public function __construct(string $value)
        {
            $h = str_split(hash("sha512", $value), 4);
            [$h[2], $h[1], $h[0]] = [$h[1], $h[4], $h[3]];
            [$h[5], $h[6], $h[4]] = [$h[2], $h[0], $h[8]];
            $this->hash = implode("", $h);
        }

        public function getHash () : string {
            return $this->hash;
        }
    }
?>