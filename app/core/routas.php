<?php

namespace App\Core;

use App\core\Routaconfig;

class Routas extends Routaconfig
{

    private static $Lista_Routas = ["/"=>"home@index"];

    public static function add($routa, $controller, $metodo)
    {
        if (is_array($routa)) {
            foreach ($routa as $key => $value) {
                self::$Lista_Routas[$value] = $controller . "@" . $metodo;
            }
        } else {
            self::$Lista_Routas[$routa] = $controller . "@" . $metodo;
        }
    }

    public static function addArray($routa)
    {
        if (is_array($routa)) {
            foreach ($routa as $key => $value) {
                self::$Lista_Routas[$key] = $value;
            }
        }
    }

    // Enviando as routas para RoutaConfig
    public static function Render()
    {
        self::IniciarRoutas(self::$Lista_Routas);
    }
}
