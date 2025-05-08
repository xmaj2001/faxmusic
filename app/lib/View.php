<?php

namespace App\lib;

class View
{
    private static $dados = null;
    public static function SETDADOS($valor)
    {
        if (is_array($valor)) {
            self::$dados = $valor;
        }
    }
    public static function header($file_name)
    {
        if (isset(self::$dados))
            extract(self::$dados);
        // Header   
        if (!empty($file_name)) {
            if (file_exists(_Headers . $file_name . ".php")) {
                require _Headers . $file_name . ".php";
            } else {
                $file = _Headers . $file_name . ".php";
                require "inc/erro_file.php";
            }
        }
    }
    public static function conteudo($file_name)
    {
        if (isset(self::$dados))
            extract(self::$dados);
        // Conteudo
        if (!empty($file_name)) {
            if (file_exists(_Pages . $file_name . ".php")) {
                require _Pages . $file_name . ".php";
            } else {
                $file = _Pages . $file_name . ".php";
                require "inc/erro_file.php";
            }
        }
    }
    public static function include($file_name,$data = null)
    {
        if (isset(self::$dados))
            extract(self::$dados);
        // Conteudo
        if (!empty($file_name)) {
            if (file_exists(_includes. $file_name . ".php")) {
                require _includes. $file_name . ".php";
            } else {
                $file = _includes. $file_name . ".php";
                require "inc/erro_file.php";
            }
        }
    }
    public static function res($file_name,$data = null)
    {
        if (isset(self::$dados))
            extract(self::$dados);
        // Conteudo
        if (!empty($file_name)) {
            if (file_exists(_res. $file_name . ".php")) {
                require _res. $file_name . ".php";
            } else {
                $file = _res. $file_name . ".php";
                require "inc/erro_file.php";
            }
        }
    }

    public static function footer($file_name)
    {
        if (isset(self::$dados))
            extract(self::$dados);
        // Footer
        if (!empty($file_name)) {
            if (file_exists(_Footeres . $file_name . ".php")) {
                require _Footeres . $file_name . ".php";
            } else {
                $file = _Footeres . $file_name . ".php";
                require "inc/erro_file.php";
            }
        }
    }

    public static function render($header, $conteudo, $footer, $valor)
    {

        if (is_array($valor))
            extract($valor);
        // Header

        if (!empty($header)) {
            if (file_exists(_Headers . $header . ".php")) {
                require _Headers . $header . ".php";
            } else {
                $file = _Headers . $header . ".php";
                require "inc/erro_file.php";
            }
        }

        // Conteudo
        if (!empty($conteudo)) {
            if (file_exists(_Pages . $conteudo . ".php")) {
                require _Pages . $conteudo . ".php";
            } else {
                $file = _Pages . $conteudo . ".php";
                require "inc/erro_file.php";
            }
        }

        // Footer
        if (!empty($footer)) {
            if (file_exists(_Footeres . $footer . ".php")) {
                require _Footeres . $footer . ".php";
            } else {
                $file = _Footeres . $conteudo . ".php";
                require "inc/erro_file.php";
            }
        }
    }
}
