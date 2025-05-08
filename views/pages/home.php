<?php
// var_dump($itens);

use App\lib\View;

?>
<style>
    .fund {
        background-image: url(/assets/img/fm.jpg);
        background-size: cover;
        width: 100%;
        animation-name: pulse;
        animation-duration: 8s;
        animation-iteration-count: infinite;
    }

    .fundom {
        background-image: url(/assets/img/simg/festa.jpg);
        background-size: cover;
        width: 100%;
        animation-name: pulse;
        animation-duration: 5s;
        animation-iteration-count: infinite;
    }
</style>
<section class="full height">
    <div class="zoomed masthead segment fund wow ">
        <div class="ui container">
            <div class="introduction">
                <h1><b class="fm">Fax Music</b></h1>
            </div>
        </div>
    </div>

    <!-- Postes -->
    <section class="ui stripe theming vertical segment">
        <h2 class="w3-center">Em <b class="logo">Destaque</b></h2>
        <div class="ui doubling four column center aligned grid container">
            <div class="row">
                <?php
                if (isset($novidades)) {
                    $i = 0;
                    foreach ($novidades as $key => $value) {
                        if ($i >= 4) {
                            $i = 0;
                        }
                        $value["i"] = $i;
                        View::res("iten",$value);
                    }
                }
                ?>
            </div>
        </div>
        <h2 class="w3-center">Em <b class="logo">Lançamento</b></h2>
        <div class="ui doubling four column center aligned grid container">
            <div class="row">
                <?php
                if (isset($lancamentos)) {
                    $i = 0;
                    foreach ($lancamentos as $key => $value) {
                        if ($i >= 4) {
                            $i = 0;
                        }
                        $value["i"] = $i;
                        View::res("iten",$value);
                    }
                }
                ?>
            </div>
            <div class="ui demo">
                <?php

                if (isset($page2) && $page2 == true) {
                ?>
                    <a href="/musicas/pagina/2" class="ui button black basic">Ver mais</a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Contas -->
    <section class="work">
        <div class="work__gallery">
            <div class="grid-sizer"></div>
            <div class="work__item wide__item set-bg wow pulse" data-wow-duration="8s" data-wow-iteration="infinite" data-setbg="/assets/img/dj/dj.jfif">
                <a href="/djs" class=" video-popup">
                    <h2 class="w3-display-middle w3-text-white" style="margin-top:5px;">DJ</h2>
                </a>
            </div>
            <div class="grid-sizer"></div>
            <div class="work__item wide__item set-bg wow pulse" data-wow-delay="2s" data-wow-duration="8s" data-wow-iteration="infinite" data-setbg="/assets/img/simg/work-3.jpg">
                <a href="/artistas" class=" video-popup">
                    <h2 class="w3-display-middle w3-text-white" style="margin-top:5px;">Artistas</h2>
                </a>
            </div>
            <div class="grid-sizer"></div>
            <div class="work__item wide__item set-bg wow pulse" data-wow-delay="3s" data-wow-duration="8s" data-wow-iteration="infinite" data-setbg="/assets/img/pro/pro.jfif">
                <a href="/produtoras" class=" video-popup">
                    <h2 class="w3-display-middle w3-text-white" style="margin-top:5px;">Produtoras</h2>
                </a>
            </div>
        </div>
    </section>
    <!-- Sobre FM -->
    <section class="ui stripe community vertical segment">
        <div class="ui two column center aligned divided very relaxed stackable grid container">
            <div class="row">
                <div class="column">
                    <img class="ui image medium" src="/assets/img/logo/logo.png" style="margin-top: -25px;margin-left: auto; margin-right: auto;">
                </div>
                <div class="column">
                    <h2 class="ui icon header logo">
                        Fax Music
                    </h2>
                    <p>
                        Somos uma plataforma de Divulgaçao de conteudo voltado ao munda da musica.
                        Seja um videoclipe uma musica(EP,MIXTYPE,ALBUM) ou MIX ou ate mesmo Beats.
                    </p>
                    <p>Vem se juntar a nos.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Fundo Music -->
    <section class="ui stripe vertical fundom">
        <div class="ui center aligned w3-center">
            <h1 class="logo">
                <i class="icon music circular"></i>
            </h1>
            <p class="w3-text-white">A musica é vida é alegria é festa é amor e muito mais</p>
        </div>
    </section>
    <!-- App -->
    <section class="ui alternate stripe vertical segment">
        <div class="ui stackable center aligned grid container">
            <div class="fourteen wide column">
                <h1 class="logo">
                    App
                </h1>
                <p>Versão aplicacional da Fax Music</p>
                <div class="ui stackable center aligned vertically padded grid">
                    <div class="eight wide column">
                        <p>Ainda em desenvolvimento</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>