<?php

use App\Model\db;
use Cocur\Slugify\Slugify;

trait res_admin
{
    public static function getfolder()
    {
        $pasta["musica"] = "music";
        $pasta["beat"] = "beat";
        $pasta["mix"] = "mix";
        $pasta["ep"] = "amp";
        $pasta["mixtype"] = "amp";
        $pasta["album"] = "amp";
        return $pasta;
    }

    public static function gethref($valor)
    {
        $slug = new Slugify();
        $href = $slug->slugify($valor);
        $nl = db::Numlinhas("SELECT id from itens where href = '$href'");
        while ($nl > 0) {
            $href = $href . "-" . $nl;
            $nl = db::Numlinhas("SELECT id from itens where href = '$href'");
        }
        return $href;
    }

    public static function gettipo_rota($rota)
    {
        $tipo = "musica";
        $tipos = array("musica", "ep", "album", "mix", "mixtype", "beat");
        if (isset($rota[key($rota)])) {
            $tipo = key($rota);
            if (!in_array($tipo, $tipos))
                header("Location: /musicas");
        }
        return $tipo;
    }
}
