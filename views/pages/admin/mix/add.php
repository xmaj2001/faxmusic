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
            <h2 class="w3-center w3-display-middle w3-margin-top">Nova <b class="logo">MIX</b></h2>
            <a href="/add" class="blurring w3-text-black w3-center w3-display-middle" style="padding: 50px 10px; margin-top: -10px;">
                <i class="icon plus logo"></i>
            </a>
        </div>
        <div class="feature alternate ui stripe vertical segment">
            <form method="POST" class="ui form w3-container w3-center w3-margin-top">
                <div class="ui container middle aligned column ">

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="music icon"></i>
                        <input name="nome" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Nome" required>
                    </div>

                    <div class="wide field w3-margin-top">
                        <input name="titulo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Titulo Opcional">
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="sliders horizontal icon"></i>
                        <input name="autor" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="DJ" required>
                    </div>

                    <div class="wide field w3-margin-top">
                        <input name="ano" type="date" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Ano" required>
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="picture icon"></i>
                        <input name="capa" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Capa">
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="image icon"></i>
                        <input name="fundo" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Fundo">
                    </div>

                    <div class="wide field w3-margin-top ui icon input">
                        <i class="hdd icon"></i>
                        <input name="arm" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Tamanho: 0KB" required>
                    </div>
                    <div class="wide field w3-margin-top ui icon input">
                        <i class="file icon"></i>
                        <input name="file" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Link para baixar" required>
                    </div>

                </div>
                <button name="btn_add" class="ui button w3-text-white w3-margin-top black basic" type="submit">Adicionar</button>
            </form>
        </div>

    </div>
</div>