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
<div class="ui basic modal">
    <div class="w3-center w3-margin-top">
        <div class="ui icon input field" style="width: 400px;">
            <input type="text" placeholder="pesquisar...">
            <i class="search icon"></i>
        </div>
        <div class="ui container animated list" id="view">

        </div>
        
    </div>
</div>
<section class="full height">
    <div class="zoomed masthead segment fund wow ">
        <div class="ui container">
            <div class="introduction">
                <h1><b class=""><?php echo strtoupper($tpage) ?></b></h1>
            </div>
        </div>
    </div>

    <!-- Postes -->
    <section class="ui stripe theming vertical segment">
        <h2 class="w3-center"><b class="text-primary"></b></h2>
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
            <div class="ui demo buttons">
                <?php
                for ($i2 = 1; $i2 <= $paginas; $i2++) {
                    $active = "";
                    $active2 = "";
                    if ($pagina == $i2) {
                        $active = "active basic";
                        $active2 = "logo";
                    }
                ?>
                    <a href="<?php echo "/$tpage/pagina/$i2" ?>" class="ui <?php echo $active ?> button black"><span class="<?php echo $active2 ?>"><?php echo $i2 ?></span></a>
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


    <script>
        $.ajax({
            method: "POST",
            url: "/pesquisar",
            data: {
                tipo: ""
            },
            success: function(result) {
                $("#view").html(result);
            }
        })
    </script>