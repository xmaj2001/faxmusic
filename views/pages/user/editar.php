<style>
    .fund {
        background-image: url(/assets/img/fm.jpg);
        background-size: cover;
    }

    input[type=placeholder] {
        color: lime !important;
        ;
    }
</style>
<div class="pusher">
    <div class="full height">
        <div class="zoomed masthead segment fund w3-display-container" style="height: 300px;">
            <h2 class="w3-center w3-display-middle w3-margin-top">Perfil</h2>
        </div>
        <div class="feature alternate ui stripe vertical segment  w3-container w3-center">
            <div class="wide field w3-margin-top ui icon input">
                Nome: <?php echo $nome ?>
            </div>
            <br>
            <div class="wide field w3-margin-top ui icon input">
                Email: <?php echo $email ?>
            </div>
            <form method="POST" class="ui form">
                <div class="ui container middle aligned column">

                    <div class="ui icon input wide field">
                        <i class="lock icon"></i>
                        <input name="senha" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Senha atual" required>
                    </div>

                    <div class="ui icon input wide field">
                        <i class="lock icon"></i>
                        <input name="titulo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Nova Senha">
                    </div>
                </div>
                <button name="btn_add" class="ui button w3-text-white w3-margin-top black basic" type="submit">Altera</button>
            </form>
        </div>
    </div>


</div>
</div>