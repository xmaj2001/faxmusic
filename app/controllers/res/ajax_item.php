<?php
// extract($data);
extract($value);
if (empty($capa)) {
    $capa = "/assets/img/itens/" . strtolower($tipo) . ".png";
}
?>
<div class="item">
    <img class="ui avatar image" src="<?php echo $capa ?>">
    <div class="content">
      <div class="header w3-text-white"><?php echo $nome ?></div>
    </div>
  </div>