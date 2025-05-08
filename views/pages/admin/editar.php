<?php

use App\helper\assets;
use App\helper\inc;
use App\helper\session;
use App\model\tb;
use App\model\where;
use Cocur\Slugify\Slugify;

$slug = new Slugify();
$data = session::get("userx_fm");
$tipoc = $data["tipo"];
$background = $fundo;
if ($fundo == null || $fundo == "") {
    $background = assets::gradientes(mt_rand(1, 14), true, true);
}
?>
<style>
    .fund {
        background-image: url(<?php echo $background ?>);
        background-size: cover;
    }
</style>
<div class="pusher">
    <div class="full height">
        <div id="editar" class="zoomed masthead segment fund">
            <div class="ui container">
                <div class="introduction">

                    <div class="w3-text-white w3-margin-top">
                        <a href="/musica/<?php echo $href ?>" class="card">
                            <div class="image w3-margin-bottom">
                                <img src="<?php echo $capa ?>" class="ui image small" style="margin-left: auto;margin-right: auto;">
                            </div>
                        </a>
                    </div>
                    <div class="ui middle aligned animated list">
                        <?php
                        if (strtolower($tipo) == "mix") {
                            $user = tb::registro("us", where::id($us));
                            $nome = tb::_registro("detalhe", "titulo", where::id($us));
                        ?>
                            <h2 class="item w3-text-white">
                                <a href="<?php echo "/" . strtolower($tipo) . "/" . $href ?>" class="w3-text-white"><b><?php echo $titulo ?></b></a>
                            </h2>
                            <div class="item w3-text-white">
                                <a href="/dj/<?php echo $slug->slugify($user["href"]) ?>" class="w3-text-white">
                                    <b class="logo">DJ</b> <?php echo $nome ?>
                                </a>
                            </div>
                            <div class="item w3-text-white">
                                Ano: <a href="/musicas/ano/<?php echo $ano ?>" class="w3-text-white"><b><?php echo $ano ?></b></a>
                            </div>
                        <?php
                        } else if (strtolower($tipo) == "musica") {
                        ?>
                            <h2 class="item w3-text-white">
                                <a href="<?php echo "/" . strtolower($tipo) . "/" . $href ?>" class="w3-text-white"><b><?php echo $titulo ?></b></a>
                            </h2>

                            <div class="item w3-text-white">
                                <a href="/artista/<?php echo $slug->slugify($artista) ?>" class="w3-text-white">
                                    <b class="logo">Artista</b> <?php echo $artista ?>
                                </a>
                            </div>
                            <div class="item w3-text-white">
                                <a href="/produtora/<?php echo $slug->slugify($produtora) ?>" class="w3-text-white">
                                    Produtora: <b><?php echo $produtora ?></b>
                                </a>
                            </div>
                            <div class="item w3-text-white">
                                Género: <a href="/musicas/genero/<?php echo $genero ?>" class="w3-text-white"><b><?php echo $genero ?></b></a>
                            </div>
                            <div class="item w3-text-white">
                                Ano: <a href="/musicas/ano/<?php echo $ano ?>" class="w3-text-white"><b><?php echo $ano ?></b></a>
                            </div>
                        <?php
                        } else if (strtolower($tipo) == "ep" || strtolower($tipo) == "mixtype" || strtolower($tipo) == "album") {
                        ?>
                            <h2 class="item w3-text-white">
                                <a href="<?php echo "/" . strtolower($tipo) . "/" . $href ?>" class="w3-text-white"><b><?php echo $titulo ?></b></a>
                            </h2>

                            <div class="item w3-text-white">
                                <a href="/artista/<?php echo $slug->slugify($artista) ?>" class="w3-text-white">
                                    <b class="logo">Artista</b> <?php echo $artista ?>
                                </a>
                            </div>
                            <div class="item w3-text-white">
                                Faixas: <a class="w3-text-white"><b><?php echo $faixas ?></b></a>
                            </div>
                            <div class="item w3-text-white">
                                Ano: <a href="/musicas/ano/<?php echo $ano ?>" class="w3-text-white"><b><?php echo $ano ?></b></a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <h2 class="item w3-text-white">
                                <a href="<?php echo "/" . strtolower($tipo) . "/" . $href ?>" class="w3-text-white"><b><?php echo $titulo ?></b></a>
                            </h2>

                            <div class="item w3-text-white">
                                <a href="/produtora/<?php echo $slug->slugify($produtora) ?>" class="w3-text-white">
                                    <b class="logo">Produtora</b> <?php echo $produtora ?>
                                </a>
                            </div>
                            <div class="item w3-text-white">
                                Género: <a class="w3-text-white"><b><?php echo $genero ?></b></a>
                            </div>
                            <div class="item w3-text-white">
                                Ano: <a href="/musicas/ano/<?php echo $ano ?>" class="w3-text-white"><b><?php echo $ano ?></b></a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="item w3-text-white">
                            <a href="/musicas/ano/<?php echo $file ?>" class="w3-text-white"><i class="icon download logo"></i><b>Baixar</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="/musica/editar/<?php echo $href ?>" method="post">
            <div class="ui stripe community vertical segment">
                <div class="ui two column center aligned divided very relaxed stackable grid">
                    <div class="row">
                        <div class="column ui form w3-container w3-center">
                            <h2><b class="logo"><?php echo strtoupper($tipo) ?></b></h2>
                            <div class="ui container middle aligned column">
                                <div class="wide field w3-margin-top labeled">
                                    <label for="titulo" style="text-align: left;">Nome</label>
                                    <input name="titulo" value="<?php echo $titulo ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Nome" required>
                                </div>
                                <?php
                                if ($tipo == "musica") {
                                ?>
                                    <div class="wide field w3-margin-top">
                                        <label for="produtora" style="text-align: left;">Produtora</label>
                                        <input name="produtora" value="<?php echo $produtora ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Produtora">
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($tipo == "musica" && $tipo == "beat") {
                                ?>
                                    <div class="wide field w3-margin-top">
                                        <label for="genero" style="text-align: left;">Género</label>
                                        <input name="genero" value="<?php echo $tipo ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Género">
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($tipo == "ep" || $tipo == "album" || $tipo == "mixtype") {
                                ?>
                                    <div class="wide field w3-margin-top">
                                        <label for="faixas" style="text-align: left;">Faixas</label>
                                        <input name="faixas" value="<?php echo $faixas ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Género">
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="wide field w3-margin-top">
                                    <label for="ano" style="text-align: left;">Ano</label>
                                    <input name="ano" value="<?php echo $ano ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Ano">
                                </div>

                                <div class="wide field w3-margin-top">
                                    <label for="capa" style="text-align: left;">Capa</label>
                                    <input name="capa" value="<?php echo $capa ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Capa" required>
                                </div>

                                <div class="wide field w3-margin-top">
                                    <label for="fundo" style="text-align: left;">Fundo</label>
                                    <input name="fundo" value="<?php echo $fundo ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Fundo">
                                </div>

                                <div class="wide field w3-margin-top">
                                    <label for="file" style="text-align: left;">Link para baixar</label>
                                    <input name="file" value="<?php echo $file ?>" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Link para baixar" required>
                                </div>

                                <?php
                                if ($tipo == "ep" || $tipo == "album" || $tipo == "mixtype") {
                                ?>
                                    <div class="field">
                                        <label class="w3-left">Informaçao</label>
                                        <textarea name="info" placeholder="Sobre" class="w3-border-0 w3-border-bottom w3-transparent"><?php echo $info ?></textarea>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <button name="btn_action" class="ui button w3-margin-top inverted w3-black" type="submit">Salvar</button>
                    <button name="btn_del" class="ui button w3-margin-top inverted w3-text-red w3-black" type="submit">
                        <i class="icon trash"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
