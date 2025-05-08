<?php

use App\lib\pagina;
use App\Model\db;

class home extends pagina
{
    public static function index()
    {
        $pg = null;
        $numl = db::Numlinhas("SELECT *FROM itens");
        $nun_itens_destaq = 8;
        $nun_itens_lancamento = 12;
        $resto = $numl - $nun_itens_destaq;
        $total= $nun_itens_destaq + $nun_itens_lancamento;
        $sqn = "";
        $sql = "";
        if($resto <= 0){
            $nun_itens_destaq = $numl;
        }

        if($numl > $total){
            $pg = true;
        }
        $sqn = "SELECT *FROM itens order by de desc limit 0,$nun_itens_destaq";
        $sql = "SELECT *FROM itens order by de desc limit $nun_itens_destaq,$nun_itens_lancamento";

        $novidades = db::SELECIONA($sqn);
        $lancamento = db::SELECIONA($sql);
        $dados = [
            "novidades" => $novidades,
            "lancamentos" => $lancamento,
            "page2"=>$pg
        ];
        self::titulo("Fax music");
        self::header("navbar");
        self::conteudo("home");
        self::footer("footer");
        self::LoadLayout(null, $dados);
    }
    
    public static function sobre()
    {
        self::titulo("Sobre Fax music");
        self::header("navbar");
        self::conteudo("sobre");
        self::footer("footer");
        self::LoadLayout();
    }
}
