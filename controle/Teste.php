<?php

class Teste extends Control
{
    function index()
    {
        $this->get_template('home');
    }
    function contato()
    {
        $this->get_template('contato');
    }
    function routers()
    {
        router('/home', "Teste@index");
        router('/contato', "Teste@contato");
        router('/', "Teste@index");
    }
}
