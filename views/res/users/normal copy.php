<?php

use App\lib\session;

$nome = session::get("userx_fm")["nome"];
$href = session::get("userx_fm")["href"];
?>
<div class="item">
    <div class="header"><i class="icon user circle logo"></i><?php echo $nome ?></div>
    <div class="menu">
        <a class="item" href="/meus-downloads">
            Downloads
            <i class="icon download logo"></i>
        </a>
        <a class="item" href="/<?php echo "@" . $href ?>">
            Perfil
            <i class="icon user circle logo"></i>
        </a>
        <a class="item" href="/<?php echo "@" . $href . "/settings" ?>">
            Editar
            <i class="icon settings logo"></i>
        </a>
    </div>
</div>