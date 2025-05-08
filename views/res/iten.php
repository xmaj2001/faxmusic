<?php

extract($data);
// extract($value);
if (empty($capa)) {
    $capa = "/assets/img/itens/" . strtolower($tipo) . ".png";
}
?>
<div class="column ui special cards link wow bounceInUp" data-wow-duration="1.1s" style="margin-top: 12px;">
    <div class="card">
        <div class="blurring dimmable image">
            <div class="ui dimmer">
                <div class="ui middle aligned animated list">
                    <a href="<?php echo "/$tipo/" . $href?>" class="w3-text-white">
                        <i class="icon music circular w3-text-red big"></i>
                    </a>
                    <div class="item w3-text-white">
                        <a href="/<?php echo $tipo ?>" class="w3-text-white">
                            <b class="logo"><?php echo strtoupper($tipo) ?></b> <?php  ?>
                        </a>
                        <p class="w3-text-white w3-hide-small"><?php echo $titulo ?></p>
                    </div>
                </div>
            </div>
            <img src="<?php echo $capa ?>" class="ui image wow pulse" data-wow-delay="<?php echo $i . "s"; ?>" data-wow-duration="8s" data-wow-iteration="infinite">
        </div>
    </div>
    <p class="item" style="font-size: 80%;">
        <a href="<?php echo "/$tipo/" . $href?>" class="w3-text-black"><b><?php echo $nome ?></b></a>
    </p>
</div>