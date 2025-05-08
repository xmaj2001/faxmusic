<?php

function admin()
{
    return [
        "/add" => "admin@add",
        "/add/".texto => "admin@additen",
        "/editar/musica/".href => "admin@editariten",
        "/editar/beat/".href => "admin@editariten",
        "/editar/mix/".href => "admin@editariten",
        "/editar/ep/".href => "admin@editariten",
        "/editar/album/".href => "admin@editariten",
        "/editar/mixtype/".href => "admin@editariten",
        "/apagar/musica/".href => "admin@deliten",
        "/apagar/".href => "admin@deletariten",
        "/apagar/beat/".href => "admin@deliten",
        "/apagar/mix/".href => "admin@deliten",
        "/apagar/ep/".href => "admin@deliten",
        "/apagar/album/".href => "admin@deliten",
        "/apagar/mixtype/".href => "admin@deliten"
    ];
}


// Itens
function musica()
{
    return [
        "/musicas" => "itens@todos",
        "/musicas/pagina/".numerico => "itens@todos",
        "/musica" => "itens@musicas",
        "/musica/".href => "itens@iten",
        "/musica/pagina/".numerico => "itens@musicas"
    ];
}
// Itens
function beat()
{
    return [
        "/beat" => "itens@beat",
        "/beat/".href => "itens@iten",
        "/beat/pagina/".numerico => "itens@beat"
    ];
}
// Itens
function mix()
{
    return [
        "/mix" => "itens@mix",
        "/mix/".href => "itens@iten",
        "/mix/pagina/".numerico => "itens@mix"
    ];
}
// Itens
function ep()
{
    return [
        "/ep" => "itens@ep",
        "/ep/".href => "itens@iten",
        "/ep/pagina/".numerico => "itens@ep"
    ];
}
// Itens
function album()
{
    return [
        "/album" => "itens@album",
        "/album/".href => "itens@iten",
        "/album/pagina/".numerico => "itens@album"
    ];
}
// Itens
function mixtype()
{
    return [
        "/mixtype" => "itens@mixtype",
        "/mixtype/".href => "itens@iten",
        "/mixtype/pagina/".numerico => "itens@mixtype"
    ];
}


