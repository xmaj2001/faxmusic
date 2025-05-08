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
                <i class="icon add logo"></i> Nova Conta
            </h1>
        </div>

        <div class="feature alternate ui stripe vertical segment">
            <form action="/nova" method="POST" class="ui form w3-container w3-center w3-margin-top">
                <div class="ui container middle aligned column ">
                    <div class="wide field w3-margin-top">
                        <input name="nome" type="text" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Nome" required>
                    </div>
                    <input name="href" type="text" class="w3-hide">
                    <div class="wide field w3-margin-top">
                        <input name="email" type="email" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="Email" required>
                    </div>
                    <div class="ui form">
                        <div class="field">
                            <div class="ui selection dropdown w3-border-0 w3-border-bottom w3-transparent">
                                <input type="hidden" name="tipo" required>
                                <i class="dropdown icon"></i>
                                <div class="default text">Tipo de Conta</div>
                                <div class="menu">
                                    <div class="item" data-value="1" data-title="Conta Normal" data-content="Você terá permissão para fazer download de conteúdo dos usuários registrado no sistema.">Normal</div>
                                    <div class="item" data-value="2" data-title="Conta Artista" data-content="Nesta conta você poderá postar musicas (Álbum,EP, MIXTYPE) e vídeos e também podes fazer download  de conteúdo dos outros usuários registrado no sistema.">Artista</div>
                                    <div class="item" data-value="3" data-title="Conta Produtora" data-content="Aqui você poderá postar beats e também  musicas (Álbum,EP, MIXTYPE) e vídeos e também podes fazer download  de conteúdo dos outros usuários registrado no sistema.">Produtora</div>
                                    <div class="item" data-value="4" data-title="Conta DJ" data-content="Você poderá postar Mix ,instrumentais e vídeos também podes fazer download  de conteúdo dos outros usuários registrado no sistema.">DJ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wide field w3-margin-top">
                        <input name="senha" type="password" class="w3-border-0 w3-border-bottom w3-transparent" placeholder="senha" required>
                    </div>
                </div>
                <button name="bt_action" class="ui button w3-text-white w3-margin-top black" type="submit">
                    <i class="icon add logo"></i> Adicionar Novo
                </button>
                <a class="logo w3-margin-top" href="/login"><i class="icon sign-in logo"></i> Entrar</a>
            </form>
        </div>

    </div>
</div>
<script>
    $('.ui.dropdown').dropdown();
    $('.menu .item').popup();
</script>