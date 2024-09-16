<?php 

    function get_command_output($command) {
        $output = shell_exec($command);
        return $output == "" ? "Неизвестная команда" : $output;
    }


?>