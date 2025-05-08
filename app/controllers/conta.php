<?php

use App\lib\pagina;
use App\lib\session;
use App\Model\db;
use App\Model\where;
use Cocur\Slugify\Slugify;

class conta extends pagina
{
    public static function index()
    {
        $ems = "";
        if (isset($_POST["btn_sv"])) {
            $s1 = md5($_POST["senha"] . "-hunterkeymura_faxonemaj2001");
            extract(session::get("userx_fm"));
            if ($s1 == $senha) {
                $nova = md5($_POST["nova"] . "-hunterkeymura_faxonemaj2001");
                $us["senha"] = $nova;
                db::Atualiza("us", where::id($id),$us);
                session::set("userx_fm", db::ST_Linha("us",where::id($id)));
                $ems = "atualizada";
            }else{
                $ems = "erro";
            }
        }
        $dados =[
            "user"=> session::get("userx_fm"),
            "ems"=>$ems
        ];
        self::titulo("Perfil");
        self::header("navbar");
        self::conteudo("user/home");
        self::footer("footer");
        self::LoadLayout(null, $dados);
    }

    public static function login()
    {
        $data = [
            "ms" => ""
        ];
        if (isset($_POST["bt_action"])) {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"] . "-hunterkeymura_faxonemaj2001");
            $us = db::S_linha("SELECT *from us where nome = '{$nome}' and email = '$email' and senha = '$senha' LIMIT 1");
            if (isset($us)) {
                session::set("userx_fm", $us);
                header("Location: /@" . $us["href"]);
            } else {
                $data["tipo"] = "negative";
                $data["ms"] = "<h4>O usuário {$nome} não foi encontrado</h4>
                        <p>Verifica se os dados inserido estão correto</p>";
            }
        }
        self::titulo("Login");
        self::header("navbar");
        self::conteudo("log/login");
        self::footer("footer");
        self::LoadLayout(dados: $data);
    }
    public static function novo()
    {
        $result = null;
        if (!session::existe("userx_fm")) {
            if (isset($_POST["btn_add"])) {
                $slug = new Slugify();
                $href = $slug->slugify($_POST["nome"]);
                $nome = $_POST["nome"];
                $tipo = $_POST["tipo"];
                $senha = md5($_POST["senha"] . "-hunterkeymura_faxonemaj2001");
                $_POST["senha"] = $senha;
                $cont = db::Numlinhas("SELECT *from us where href = '{$href}' and tipo = {$tipo}");
                while ($cont > 0) {
                    $cont++;
                    $href .= "-" . $cont;
                    $cont = db::Numlinhas("SELECT *from us where href = '{$href}' and tipo = {$tipo}");
                }

                $_POST["href"] = $href;
                $id = db::Rid("us");
                if ($result) {
                    $us = db::ST_Linha("us", where::id($id));
                    session::set("userx_fm", $us);
                    header("Location: /conta");
                }
            }
        } else {
            header("Location: /");
        }
        $dados = null;
        self::titulo("Fax Music");
        self::header("navbar");
        self::conteudo("log/novo");
        self::footer("footer");
        self::LoadLayout(dados: $dados);
    }

    public static function editar()
    {
        $dados = session::get("userx_fm");
        self::titulo("Editar");
        self::header("navbar");
        self::conteudo("user/editar");
        self::footer("footer");
        self::LoadLayout(null, $dados);
    }

    public static function sair()
    {
       session::limpar();
       header("Location: /");
    }

    public static function dw()
    {
        $id = session::get("userx_fm")["id"];
        $dw = db::SELECIONA_TB("dw", where::onde("id_user", "=", $id));
        $its = array();
        if (count($dw) > 0) {
            foreach ($dw as $key => $value) {
                array_push($its, db::ST_Linha("itens", where::id($value["id_item"])));
            }
        }
        $dados = [
            "itens" => $its
        ];
        self::titulo("Meus Downloads");
        self::header("navbar");
        self::conteudo("user/downloads");
        self::footer("footer");
        self::LoadLayout(null, $dados);
    }
}
