<?php

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
            <h2 class="w3-center w3-display-middle w3-margin-top">Novos <b class="logo">Postes</b></h2>
            <a href="/add" class="blurring w3-text-black w3-center w3-display-middle" style="padding: 50px 10px; margin-top: -10px;">
               <i class="icon plus logo"></i>
            </a>
        </div>

        <div class="ui stripe theming vertical segment">

            <div class="ui doubling four column center aligned grid cards container">
                <?php
                if ($tipo == 2 || $tipo == 3) {
                ?>
                    <div class="card">
                        <a href="/add/musica" class="blurring w3-text-black" style="padding: 50px 10px;">
                            <p>Adicionar</p>
                            <h2 class="logo" style="margin-top: -10px;">Musica</h2>
                        </a>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($tipo == 3) {
                ?>
                    <div class="card">
                        <a href="/add/beat" class="blurring w3-text-black" style="padding: 50px 10px;">
                            <p>Adicionar</p>
                            <h2 class="logo" style="margin-top: -10px;">Beat</h2>
                        </a>
                    </div>
                <?php
                }
                ?>

                <div class="card">
                    <a href="/add/video" class="blurring w3-text-black" style="padding: 50px 10px;">
                        <p>Adicionar</p>
                        <h2 class="logo" style="margin-top: -10px;">Video</h2>
                    </a>
                </div>

                <?php
                if ($tipo == 4) {
                ?>
                    <div class="card">
                        <a href="/add/mix" class="blurring w3-text-black" style="padding: 50px 10px;">
                            <p>Adicionar</p>
                            <h2 class="logo" style="margin-top: -10px;">MIX</h2>
                        </a>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($tipo == 2) {
                ?>
                    <div class="card">
                        <a href="/add/ep" class="blurring w3-text-black" style="padding: 50px 10px;">
                            <p>Adicionar</p>
                            <h2 class="logo" style="margin-top: -10px;">EP</h2>
                        </a>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($tipo == 2) {
                ?>
                    <div class="card">
                        <a href="/add/mixtype" class="blurring w3-text-black" style="padding: 50px 10px;">
                            <p>Adicionar</p>
                            <h2 class="logo" style="margin-top: -10px;">MIXTYPE</h2>
                        </a>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($tipo == 2) {
                ?>
                    <div class="card">
                        <a href="/add/album" class="blurring w3-text-black" style="padding: 50px 10px;">
                            <p>Adicionar</p>
                            <h2 class="logo" style="margin-top: -10px;">Album</h2>
                        </a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>

    </div>
</div>