<?php
// var_dump($itens);

use App\lib\View;

if (isset($page))
    extract($page);
?>
<style>
    .fund {
        background-image: url(/assets/img/fm.jpg);
        background-size: cover;
        width: 100%;
        animation-name: pulse;
        animation-duration: 8s;
        animation-iteration-count: infinite;
        height: 400px;

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
                <h1>Downloads</h1>
            </div>
        </div>
    </div>

    <!-- Postes -->
    <section class="ui stripe theming vertical segment">
        <h2 class="w3-center">Recentes <b class="fm-primary">Downloads</b></h2>
        <div class="ui doubling four column center aligned grid container" id="i">
            <div class="row">
                <?php
                if (isset($itens)) {
                    $i = 0;
                    foreach ($itens as $key => $value) {
                        $i++;
                        if ($i >= 4) {
                            $i = 0;
                        }
                        $value["i"] = $i;
                        View::res("iten", $value);
                    }
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