<?php
//[a-zA-Z^]+  [a-z-^0-9]+
use App\core\routas;
use App\lib\session;

require 'lista.php';
routas::Inicializar();
routas::add("/", "home", "index");
routas::add("/sobre", "home", "sobre");
routas::add("/pesquisar", "itens", "ajaxitens");

// Admin
routas::addArray(admin());
// -----------------

// Conta
if (session::existe("userx_fm")) {
    $us = session::get("userx_fm");
    routas::add("/@".$us["href"], "conta", "index");
    routas::add("/baixar/" . texto . "/" . href, "admin", "baixar");
    routas::add("/meus-downloads", "conta", "dw");
    routas::add("/@".$us["href"]."/settings", "conta", "editar");
    routas::add("/sair", "conta", "sair");
}else{
    routas::add("/login", "conta", "login");
    routas::add("/nova-conta", "conta", "novo");
}
// -----------------

// musica
routas::addArray(musica());
// -----------------
// beat
routas::addArray(beat());
// -----------------
// mix
routas::addArray(mix());
// -----------------
// ep
routas::addArray(ep());
// -----------------
// album
routas::addArray(album());
// -----------------
// mixtype
routas::addArray(mixtype());
// -----------------


// routas::add("/", "home", "sobre");
// Retornado todas as rotas
return routas::getroutas();
