<?php
?>
<style>
    .fund {
        background-image: url("/assets/img/login.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
    }
</style>
<div class="pusher">
    <div class="full height">
        <div class="w3-display-container masthead fund" style="height: 300px;">
            <h1 class="w3-display-middle ">
                <i class="icon sign-in logo"></i> Entrar
            </h1>
        </div>
        <div class="feature alternate ui stripe vertical segment">
            <form action="/login" method="POST" class="ui form w3-container w3-center w3-margin-top">
                <?php
                if ($ms != "") {
                ?>
                    <div class="ui <?php echo $tipo ?>">
                        <p><?php echo $ms ?></p>
                    </div>
                <?php
                }
                ?>
                <div class="ui container middle aligned column ">

                    <div class="wide field w3-margin-top">
                        <input name="nome" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Nome" required>
                    </div>
                    <input name="href" type="text" class="w3-hide">
                    <div class="wide field w3-margin-top">
                        <input name="email" type="email" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Email" required>
                    </div>
                    <div class="wide field w3-margin-top">
                        <input name="senha" type="password" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="senha" required>
                    </div>
                </div>
                <button name="bt_action" class="ui button w3-text-white w3-margin-top inverted black logo" type="submit">
                    <i class="icon sign-in logo"></i> Entrar
                </button>
                <a href="/nova-conta" class="ui button w3-text-white w3-margin-top logo w3-transparent">Criar conta</a>

            </form>
        </div>

    </div>
</div>
<script>
    $('select.dropdown').dropdown();
</script>