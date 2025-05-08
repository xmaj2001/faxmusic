<?php

use App\lib\session;

$nome = session::get("admx_fm")["nome"];
?>
<!-- ADMIM -->
<div class="item">
    <div class="header"><i class="icon user circle logo"></i><?php echo $nome ?></div>
    <div class="menu">
        <a class="item" href="/Adicionar">
            Adicionar
            <i class="icon plus logo"></i>
        </a>
        <a class="item" href="/downloads">
            Downloads
            <i class="icon download logo"></i>
        </a>
        <a class="item" href="/contas">
            Contas
            <i class="icon user circle logo"></i>
        </a>
        <a class="item" href="/settings">
            Editar
            <i class="icon settings logo"></i>
        </a>
    </div>
</div>