<?php

use App\lib\View;
use App\Model\db;
use App\Model\where;

extract(db::ST_Linha("arquivo", where::onde("iten", "=", $id)));

$fundo_ = $fundo;
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
                        <h2 class="item  wow pulse" data-wow-duration="7s" data-wow-iteration="infinite">
                            <a href="<?php echo "/" . strtolower($tipo) ?>" class="logo"><b><?php echo strtoupper($tipo) ?></b></a>
                        </h2>
                        <h2 class="item w3-text-white wow pulse" data-wow-duration="7s" data-wow-iteration="infinite">
                            <a href="<?php echo "/" . strtolower($tipo) . "/" . $href ?>" class="w3-text-white"><b><?php echo $nome ?></b></a>
                        </h2>

                        <?php
                        $iten = $tipo;
                        if ($tipo == "album" || $tipo == "mixtype" || $tipo == "ep") {
                            $iten = "amp";
                        }
                        View::res("tipo_itens/" . $iten);
                        if (isset($userx_fm) && $userx_fm["id"] == $us || isset($admin_fm)) {
                        ?>
                            <div class="item w3-text-white w3-margin-top">
                                <a href="/editar/<?php echo $href ?>" class="w3-text-white"><i class="icon edit logo circular large"></i></a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="item w3-text-white w3-margin-top">
                                <?php echo $arm ?> <b class="primary-text"><?php echo strtoupper($siz) ?></b>
                            </div>
                            <div class="item w3-text-white ">
                                <a id="btn_dw_m" href="<?php echo $file ?>" class="btn btn-dark w3-text-white">
                                    <i class="icon download logo"></i>
                                    Baixar
                                </a>

                                <br>
                                <br>
                                <a href="<?php echo "/apagar/" . $tipo . "/" . $href ?>" class="ui button black inverted small basic w3-margin-top">
                                    <i class="icon trash"></i>
                                    Apagar
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="item w3-text-white w3-margin-bottom">
                <h3>
                    <?php
                    $_us = db::S_linha("SELECT tipo,href,nome FROM us where id = '$us'");
                    if (isset($_us)) {
                    ?>
                        <a id="bp" href="<?php echo "/" . $_us["tipo"] . "/" . $_us["href"] ?>" class="logo"><?php echo $_us["nome"] ?></a>
                    <?php
                    }
                    ?>
                </h3>
                <small>Partilhar</small>
                <a id="bp" href="<?php echo $file ?>" class="w3-text-white"><i class="icon facebook f"></i></a>
                <a id="bp" href="<?php echo $file ?>" class="w3-text-white"><i class="icon instagram"></i></a>
            </div>

        </div>

        <div class="feature alternate ui stripe vertical segment">
            <form method="POST" class="ui form w3-container w3-center w3-margin-top">
                <div class="ui container middle aligned column ">

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="music icon"></i>
                        <input name="nome" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $nome ?>" placeholder="Nome" required>
                    </div>
                    <div class="wide field w3-margin-top">
                        <input name="titulo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $titulo ?>" placeholder="Titulo Opcional">
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="sliders horizontal icon"></i>
                        <input name="autor" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $autor ?>" placeholder="Artista" required>
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="circle icon"></i>
                        <input name="faixas" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $faixas ?>" placeholder="Número de músicas" required>
                    </div>

                    <div class="wide field w3-margin-top">
                        <input name="ano" type="date" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $ano ?>" placeholder="Ano" required>
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="picture icon"></i>
                        <input name="capa" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $capa ?>" placeholder="Capa">
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="image icon"></i>
                        <input name="fundo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $fundo_ ?>" placeholder="Fundo">
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="hdd icon"></i>
                        <input name="arm" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $arm ?>" placeholder="Tamanho: 0KB" required>
                    </div>
                    <div class="wide field w3-margin-top ui icon input">
                        <i class="file icon"></i>
                        <input name="file" type="text" class="w3-border-0 w3-border-bottom w3-transparent" value="<?php echo $file ?>" value="<?php echo $file ?>" placeholder="Link para baixar" required>
                    </div>

                </div>
                <button name="btn_sv" class="ui button w3-text-white w3-margin-top black basic" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>