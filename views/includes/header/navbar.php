<?php

use App\lib\session;
use App\lib\View;

$us = null;
$rota = "login";
if (session::existe("userx_fm")) {
    $us = session::get("userx_fm");
    $rota = "@" . session::get("userx_fm")["href"];
}
?>
<div class="following bar">
    <div class="ui container">
        <div class="ui large inverted secondary network menu">
            <a class="ui item btn_sidbar">
                <i class="bars icon"></i>
            </a>
            <div class="item">
                <div class="ui logo shape">
                    Faxmusic
                </div>
            </div>
            <div class="right menu">
                <a href="/" class="item">
                    <i class="icon home"></i>
                </a>
                <a href="/musicas" class="item">
                    <i class="icon music"></i>
                </a>
                <a href="/sobre" class="item">
                    <i class="icon address card w3-transparent"></i>
                </a>
                <a href="/usuarios" class="item">
                    <i class="icon users card w3-transparent"></i>
                </a>
                <a class="item" href="/<?php echo $rota ?>">
                    <?php

                    if (isset($us)) {
                    ?>
                        <p class="text ui"><i class="user icon logo"></i></p>
                    <?php
                    } else {
                    ?>
                        <p class="text"><i class="sign-in icon logo"></i> Entrar</p>
                    <?php
                    }
                    ?>
                </a>
                <div class="ui language floating dropdown link item ps" id="find">
                    <i class="search icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ui up demo vertical sidebar labeled menu">
    <div style="background-image: url(/assets/img/fudo.jfif);background-repeat:no-repeat;background-size: cover;background-position: center; height: 200px;width:100%; ">
        <br>
        <br>
        <br>
        <h2 class="fm w3-center w3-text-white">FM</h2>
    </div>

    <?php
    if (session::existe("admx_fm")) {
    View::res("users/admin");
    }
    ?>

    <?php
    if (session::existe("userx_fm")) {
        View::res("users/normal");
    }
    ?>
    
    <div class="item">
        <div class="header">Publicações</div>
        <div class="menu">
            <a class="item" href="/musicas">Todas</a>
            <a class="item" href="/musica">Musicas</a>
            <a class="item" href="/mixtype">MIXTYPE</a>
            <a class="item" href="/album">ALBUM</a>
            <a class="item" href="/beat">Beats</a>
            <a class="item" href="/mix">MIX</a>
            <a class="item" href="/ep">EP</a>
        </div>
    </div>

    <!-- <div class="item">
        <div class="header">Publicadores</div>
        <div class="menu">
            <a class="item" href="/produtoras">
                Produtoras
                <i class="icon sliders horizontal"></i>
            </a>
            <a class="item" href="/artistas">
                Artistas
                <i class="icon user"></i>
            </a>
            <a class="item" href="/djs">
                <i class="icon headphones"></i>
                DJ
            </a>
        </div>
    </div> -->
    <a href="/sobre" class="item">
        <i class="box icon logo"></i>
        Sobre
    </a>
    <?php
    if (session::existe("userx_fm")) {
    ?>
        <a href="/sair" class="item">
            Sair
        </a>
    <?php
    } else {
    ?>
        <a href="/login" class="item">
            <i class="sign-out icon logo"></i>
            Entrar
        </a>
    <?php
    }
    ?>

</div>