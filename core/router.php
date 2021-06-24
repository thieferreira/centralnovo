<?php

function url_atual()
{
    $url = $_SERVER['REQUEST_URI'];
    $url = str_replace(ENV['DIR'], '', $url);
    $url = explode('?', $url)[0];
    return $url;
}
function router($caminho, $controle_metodo)
{
    $bom = explode("@", $controle_metodo);
    $nome_class = $bom[0];
    $metodo_class = $bom[1];
    if (url_atual() == $caminho) {
        if (class_exists($nome_class)) {
            $class = new $nome_class;
            if (method_exists($class, $metodo_class)) {
                $class->{$metodo_class}();
            } else {
                echo "Não existe metodo em Controle";
            }
        } else {
            echo "Controle não existe";
        }
    }
}
$modelos = glob(__DIR__ . "/../modelos/*.php");
foreach ($modelos as $model_path) {
    include_once $model_path;
}
$controles = glob(__DIR__ . "/../controle/*.php");
foreach ($controles as $control_path) {
    include_once $control_path;
    $name_class_temp = basename($control_path);
    $name_class_temp = str_replace('.php', '', $name_class_temp);
    $tmp_class = new $name_class_temp;
    if (method_exists($tmp_class, 'routers')) {
        $tmp_class->routers();
    }
}