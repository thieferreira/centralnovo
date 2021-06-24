<?php
class Control
{
    function get_template($name)
    {
        $nome_tema = ENV['TEMA'];
        $dir_tema = __DIR__ . "/../template/{$nome_tema}/{$name}.php";
        if (file_exists($dir_tema)) {
            include $dir_tema;
        } else {
            echo "Tema não encontrado";
        }
    }
}
