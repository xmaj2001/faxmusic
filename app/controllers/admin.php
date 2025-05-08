<?php

use App\lib\pagina;
use App\Model\db;
use App\Model\where;
use Cocur\Slugify\Slugify;

include "res/res_admin.php";

class admin extends pagina
{
    use res_admin;

    public static function index($rota)
    {
        $pg = 1;
        if (isset($rota["pagina"])) {
            $pg = $rota["pagina"];
        }
        $sqn = "SELECT *FROM posts order by id desc";
        $tpage = "musicas";
        if (isset($rota[""])) {
            $tipo = $rota[""];
            $tipo = db::validar_campo($tipo);
            $tpage = $tipo;
            $sqn = "SELECT *FROM posts where tipo = '$tipo' order by id desc";
        }
        $sp = db::S_Pagina($sqn, 2, $pg);
        $dados = [
            "page" => $sp,
            "tpage" => $tpage
        ];
        self::titulo("Fax music");
        self::header("navbar");
        self::conteudo("posts/itens");
        self::footer("footer");
        self::LoadLayout(null, $dados);
    }

    public static function add()
    {
        self::titulo("Adicionar Itens");
        self::header("navbar");
        self::conteudo("admin/h_admin");
        self::footer("footer");
        self::LoadLayout();
    }
    public static function additen($rota)
    {
        $tipo = $rota[key($rota)];

        $pasta = self::getfolder();

        if (isset($_POST["btn_add"])) {
            $slug = new Slugify();
            extract($_POST);
            $arquivo["arm"] = $arm;
            $arquivo["file"] = $file;

            db::remove("arm");
            db::remove("file");

            $_POST["href"] = self::gethref($nome);
            $_POST["tipo"] = $tipo;

            $id = db::Rid("itens");

            $arquivo["iten"] = $id;

            db::Registrar("arquivo", $arquivo);
            header("Location: /editar/" . $tipo . "/" . $_POST["href"]);
        }
        self::titulo("Adicionar Itens");
        self::header("navbar");
        self::conteudo("admin/{$pasta[$tipo]}/add");
        self::footer("footer");
        self::LoadLayout();
    }

    public static function editariten($rota)
    {
        $pasta = self::getfolder();

        $tipo = self::gettipo_rota($rota);

        $href = $rota[key($rota)];

        $iten = db::ST_Linha("itens", where::href($href));

        if (!isset($iten)) {
            header("Location: /musicas");
        }

        if (isset($_POST["btn_sv"])) {
            extract($_POST);

            $arquivo["arm"] = $arm;
            $arquivo["file"] = $file;

            db::remove("arm");
            db::remove("file");

            $id = $iten["id"];
            $href_status = false;
            if ($iten["nome"] != $nome) {
                $_POST["href"] = self::gethref($nome);
                $href_status = true;
            }

            db::Atualiza("itens", where::id($id));

            db::Atualiza("arquivo", where::onde("iten", "=", $id), $arquivo);
            if ($href_status) {
                header("Location: /editar/" . $tipo . "/" . $_POST["href"]);
            }
            $iten = db::ST_Linha("itens", where::id($id));
        }

        self::titulo($iten["nome"]);
        self::header("navbar");
        self::conteudo("admin/{$pasta[$tipo]}/editar");
        self::footer("footer");
        self::LoadLayout(dados: $iten);
    }

    public static function deliten($rota)
    {
        $tipo = $rota[key($rota)];
        $href = $rota[key($rota)];
        $iten = db::ST_Linha("itens", where::href($href));

        if (!isset($iten)) {
            header("Location: /musicas");
        }
        self::titulo($iten["nome"]);
        self::header("navbar");
        self::conteudo("itens/deliten");
        self::footer("footer");
        self::LoadLayout(dados: $iten);
    }

   public static function deletariten($rota)
    {
        $href = $rota[key($rota)];
        $iten = db::ST_Linha("itens", where::href($href));
        if (isset($iten)) {
            extract($iten);
            db::Deletar("arquivo", where::onde("iten", "=", $id));
            db::Deletar("itens", where::id($id));
        }
        header("Location: /musicas");
    }
}
