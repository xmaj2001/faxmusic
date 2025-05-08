<?php

use App\lib\pagina;
use App\lib\session;
use App\Model\db;
use App\Model\where;

class itens extends pagina
{
    public static function todos($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $sqn = "SELECT *FROM itens order by de desc";
        $tpage = "musicas";
        $sp = db::S_Pagina($sqn, 20, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("Fax music");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function musicas($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $tipo = "musica";
        $sqn = "SELECT *FROM itens where tipo='$tipo' order by de desc";
        $tpage = $tipo;
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("Músicas");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function beat($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $tipo = "beat";
        $sqn = "SELECT *FROM itens where tipo='$tipo' order by de desc";
        $tpage = $tipo;
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("Beats");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function mix($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $tipo = "mix";
        $sqn = "SELECT *FROM itens where tipo='$tipo' order by de desc";
        $tpage = $tipo;
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("MIX");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function mixtype($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $tipo = "mixtype";
        $sqn = "SELECT *FROM itens where tipo='$tipo' order by de desc";
        $tpage = $tipo;
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("Mixtype");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }
    public static function ep($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $tipo = "ep";
        $sqn = "SELECT *FROM itens where tipo='$tipo' order by de desc";
        $tpage = $tipo;
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("EP");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function album($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $tipo = "album";
        $sqn = "SELECT *FROM itens where tipo='$tipo' order by de desc";
        $tpage = $tipo;
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("Albúns");
        self::header("navbar");
        self::conteudo("itens/itens");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function iten($rota)
    {
        $tipo = "musica";
        $tipos = array("musica", "ep", "album", "mix", "mixtype", "beat");
        if (!isset($rota[key($rota)])) {
            $tipo = key($rota);
            if (!in_array($tipo, $tipos))
                header("Location: /musicas");
        }
        $baixar = false;

        $href = $rota[key($rota)];
        $iten = db::ST_Linha("itens", where::href($href));
        if (!isset($iten)) {
            header("Location: /musicas");
        }
        if (isset($_POST["btn_dw"])) {
            if (session::existe("userx_fm")) {
                $id_user = session::get("userx_fm")["id"];
                $id = $iten["id"];
                $ex = db::Numlinhas("SELECT *from dw where id_user = '$id_user' and id_item = '$id'");
                if ($ex == 0) {
                    $dw["id_user"] = $id_user;
                    $dw["id_item"] = $id;
                    db::Registrar("dw", $dw);
                }
                $baixar = true;
            } else {
                header("Location: /login");
            }
        }
        $id = $iten["id"];
        $bx = db::Numlinhas("SELECT *from dw where id_item = '$id'");
        $iten["bx"] = $bx;
        $iten["baixar"] = $baixar;
        self::titulo($iten["nome"]);
        self::header("navbar");
        self::conteudo("itens/iten");
        self::footer("footer");
        self::LoadLayout(dados: $iten);
    }


    public static function ajaxitens()
    {
        if (self::is_ajax() && isset($_POST["tipo"])) {
            $tipo = $_POST["tipo"];
            $tipo = db::validar_campo($tipo);
            $limit = 8;
            $sq = "SELECT *FROM itens order by de desc limit $limit";
            if ($tipo != "") {
                $sq = "SELECT *FROM itens where tipo = '$tipo' order by de desc limit $limit";
            }
            $itens = db::SELECIONA($sq);
            foreach ($itens as $key => $value) {
                require "res/ajax_item.php";
            }
        }
    }
}
