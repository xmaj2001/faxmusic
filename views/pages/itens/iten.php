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
// $admin_fm = true;

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
                                <a href="/editar/<?php echo $tipo . "/" . $href ?>" class="w3-text-white"><i class="icon edit logo circular large"></i></a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="item w3-text-white w3-margin-top">
                                <?php echo $arm ?> <b class="primary-text"><?php echo strtoupper($siz) ?></b>
                            </div>
                            <div class="item w3-text-white ">
                                <a id="btn_dw" href="<?php echo $file ?>" class="w3-hide">
                                </a>
                                <form action="" method="post">
                                    <button name="btn_dw" class="ui button inverted small" type="submit">
                                        <i class="icon download logo"></i>
                                        Baixar <span><?php echo $bx ?></span>
                                    </button>
                                </form>
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
    </div>
</div>



<?php

if ($baixar) {
?>
    <script>
        document.getElementById("btn_dw").click();
    </script>
<?php
}
$baixar = false;
?>