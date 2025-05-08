<?php

use App\lib\View;
use App\Model\db;
use App\Model\where;

extract(db::ST_Linha("arquivo", where::onde("iten", "=", $id)));

if ($fundo == null || $fundo == "") {
    $fundo = "/assets/img/itens/" . strtolower($tipo) . ".png";
    if ($tipo == "beat") {
        $fundo = "/assets/img/itens/" . strtolower($tipo) . "s.jfif";
    }
}
$siz = "kb";
if (strlen($arm) > 2) {
    $siz = $arm[strlen($arm) - 2] . $arm[strlen($arm) - 1];
    $arm = str_replace($siz, '', $arm);
}
$admin_fm = true;

?>
<style>
    .fund {
        background-image: url(<?php echo $fundo ?>);
        background-size: cover;
        animation-name: pulse;
        animation-duration: 8s;
        animation-iteration-count: infinite;
    }

    #bs {
        border: none;
        background-color: rgba(0, 0, 0, 0.5);
        border-bottom: 1px solid chocolate;
        border-radius: none;
        color: chocolate;
    }
</style>

<div class="pusher">
    <div class="full height">
        <div class="zoomed masthead segment fund">
            <div class="ui container">
                <div class="introduction">
                    <div class="ui middle aligned animated list">
                        <h2>
                        Pretendes Eliminar este Item? 
                        </h2>
                        <h4 class="item  wow pulse" data-wow-duration="7s" data-wow-iteration="infinite">
                            <a href="<?php echo "/" . strtolower($tipo) ?>" class="logo"><b><?php echo strtoupper($tipo) ?></b></a>
                        </h4>
                        <h2 class="item w3-text-white wow pulse" data-wow-duration="7s" data-wow-iteration="infinite">
                            <a href="<?php echo "/" . strtolower($tipo) . "/" . $href ?>" class="w3-text-white"><b><?php echo $nome ?></b></a>
                        </h2>

                        <?php
                        $iten = $tipo;
                        if ($tipo == "album" || $tipo == "mixtype" || $tipo == "ep") {
                            $iten = "amp";
                        }
                        View::res("tipo_itens/" . $iten);
                        ?>
                        <div class="item w3-text-white w3-margin-top w3-margin-bottom">
                            <?php echo $arm ?> <b class="primary-text"><?php echo strtoupper($siz) ?></b>
                        </div>

                        <a href="<?php echo "/" . $tipo . "/" . $href ?>" class="ui button basic inverted">
                            <i class="icon music"></i>
                            Não! voltar
                        </a>
                        <a href="<?php echo "/apagar/" . $href ?>" class="ui button red">
                            <i class="icon trash"></i>
                           Sim apagar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="w3-center logo">Apagar Iten</h3>
    </div>
</div>