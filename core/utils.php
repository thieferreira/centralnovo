<?php

function set_log( $flag, $message ) {
    $content = date("d-m-Y H:i");
    $content .= " {$flag} -> ";
    $content .= $message;
    $content .= " \n";
    file_put_contents(__DIR__ . "/../.log", $content, FILE_APPEND);
}

function query( $sql )
{
    $host = ENV['HOST'];
    $user = ENV['USER'];
    $pass = ENV['PASS'];
    $db = ENV['BANC'];
    try {
        $con = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
        $query = $con->query( $sql );
        $result = $query->fetchAll();
        return $result;
    } catch (\Throwable $th) {
        echo "error ao conectar ao banco";
        set_log('ERROR SQL', $sql );
        return [];
    }
}