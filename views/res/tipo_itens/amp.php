<a href="/artista/" class="w3-text-white">
    Artista <?php echo $autor ?>
</a>
<div class="item w3-text-white">
    Musicas: <b><?php echo $faixas ?></b>
</div>
<div class="item w3-text-white">
    Ano: <?php echo $ano ?>
</div>
<div class="item w3-text-white">
    <i class="icon clock outline"></i> <?php echo date("H:i | d/m/y", strtotime($de)) ?>
</div>