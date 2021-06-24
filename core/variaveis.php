<?php

$file_env = __DIR__ . "/../.env";

if( file_exists( $file_env ) ) {
    $env = parse_ini_file( $file_env, TRUE, INI_SCANNER_RAW );
    define( 'ENV', $env );
}else {
    define( 'ENV', [] );
    $env = [];
}
