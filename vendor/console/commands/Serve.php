<?php
    namespace Service\Console\Commands;

    use Service\Console\ConsoleInterface;

    class Serve {
        public function __construct(int $port = null) {
            $console = ConsoleInterface::getInstance();
            $port = ($port ?? SERVICE->PORT);
            $console->write("[bold][white]" . $console->getASCII("mosaic") . "[/]\n");
            $console->writeInfoBlock("=> Project served on [bold][underline]http://localhost:$port"."[/]", 'blue');
            $console->write("[white] > You can press Ctrl + C to terminate the process[/]\n\n");
            $command = "php -S localhost:$port public/index.php";
            return exec($command);
        }
    }
?>