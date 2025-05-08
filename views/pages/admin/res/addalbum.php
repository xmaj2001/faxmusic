<?php

use App\helper\assets;
use App\helper\inc;

$fundo = assets::gradientes(mt_rand(1, 14), true, true);
if ($tipo == "") {
    $tipo = "ALBUM";
}
?>
<style>
    .fund {
        background-image: url(<?php echo $fundo ?>);
        background-size: cover;
    }
</style>
<div class="pusher">
    <div class="full height">
        <div class="zoomed masthead segment fund w3-display-container" style="height: 300px;">
            <h2 class="w3-center w3-display-middle w3-margin-top">Novo <b class="logo"><?php echo $tipo ?></b></h2>
            <a href="/add" class="blurring w3-text-black w3-center w3-display-middle" style="padding: 50px 10px; margin-top: -10px;">
               <i class="icon plus logo"></i>
            </a>
        </div>

        <div class="feature alternate ui stripe vertical segment">
            <form action="/add/<?php echo strtolower($tipo) ?>" method="POST" class="ui form w3-container w3-center w3-margin-top">
                <div class="ui container middle aligned column ">
                    <div class="wide field w3-margin-top">
                        <input name="titulo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Titulo" required>
                    </div>
                    <div class="wide field w3-margin-top">
                        <input name="faixas" type="number" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Numero de Faixas" required>
                    </div>

                    <div class="wide field w3-margin-top">
                        <input name="ano" type="number" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Ano" required>
                    </div>

                    <div class="wide field w3-margin-top">
                        <input name="capa" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Capa" required>
                    </div>
                    <div class="wide field w3-margin-top">
                        <input name="fundo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Fundo">
                    </div>
                    <div class="wide field w3-margin-top">
                        <input name="file" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Link para baixar" required>
                    </div>
                    <div class="w3-hide">
                        <input name="href" type="hidden" class="w3-hide">
                        <input name="us" type="hidden" class="w3-hide">
                        <input name="artista" type="hidden" class="w3-hide">
                        <input name="tipo" type="hidden" class="w3-hide">
                    </div>
                    <div class="field">
                        <label class="w3-left">Informaçao</label>
                        <textarea name="info" placeholder="Fala um pouco sobre oque posta" class="w3-border-0 w3-border-bottom w3-transparent"></textarea>
                    </div>
                </div>
                <button name="bt_action" class="ui button w3-text-white w3-margin-top" type="submit">Adicionar</button>
            </form>
        </div>
    </div>
</div>