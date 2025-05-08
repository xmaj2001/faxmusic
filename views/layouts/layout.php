<?php

use App\lib\View;

View::SETDADOS($dados);
?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?php echo self::$Page_author ?>" />
    <meta name="keywords" content="<?php echo self::$Page_keywords ?>" />
    <meta name="description" content="<?php echo self::$Page_description ?>" />
    <title>
        <?php echo self::$Page_titulo ?>
    </title>
    <meta property="og:title" content="<?php echo self::$Page_titulo ?>" />
    <meta property="og:image" content="<?php echo self::$Page_image ?>" />
    <meta property="og:url" content="<?php echo self::$Page_url ?>" />
    <meta property="og:site_name" content="<?php echo self::$Page_titulo ?>" />
    <meta property="og:description" content="<?php echo self::$Page_description ?>" />
    <meta name="twitter:title" content="<?php echo self::$Page_titulo ?>" />
    <meta name="twitter:image" content="<?php echo self::$Page_image ?>" />
    <meta name="twitter:url" content="<?php echo self::$Page_url ?>" />
    <meta name="twitter:card" content="<?php echo self::$Page_card ?>" />
    <link rel="shortcut icon" href="<?php echo self::$Page_logo ?>" type="image/x-icon">
    <link rel="stylesheet" href="/assets/semantic.css">
    <script>
        (function() {
            var
                eventSupport = ('querySelector' in document && 'addEventListener' in window)
            jsonSupport = (typeof JSON !== 'undefined'),
                jQuery = (eventSupport && jsonSupport) ?
                "/assets/lib/semantic/javascript/library/jquery.min.js" :
                "/assets/lib/semantic/javascript/library/jquery.legacy.min.js";
            document.write('<script src="' + jQuery + '"><\/script>');
        }());
    </script>
    <script src="/assets/lib/semantic/dist/semantic.min.js"></script>
    <script src="/assets/lib/semantic/javascript/docs.js"></script>
    <script src="/assets/lib/semantic/javascript/home.js"></script>
    <script src="/assets/plugins/animation/wow.min.js"></script>
</head>

<body id="example" class="index">
    <?php View::header(self::$Page_header); ?>
    <main class="pusher">
        <?php
        View::conteudo(self::$Page_conteudo);
        View::footer(self::$Page_footer);
        ?>
    </main>
    <!-- loader -->
    <script src="/assets/lib/semantic/masonry.pkgd.min.js"></script>
    <script src="/assets/lib/semantic/main.js"></script>
    <script src="/assets/lib/semantic/javascript/library/less.min.js"></script>
    <script>
        new WOW().init();
        $('.special.cards .card .image').dimmer({
            on: 'hover'
        });
        $('.menu .item').tab();
        $('.dimmer').popup();
        $('.ui.basic.modal')
            .modal('show');
        $(".btn_sidbar").click(function() {
            $('.demo.sidebar').sidebar('setting', 'transition', 'scale down').sidebar('toggle');
        });
        window.less = {
            async: true,
            environment: 'production',
            fileAsync: false,
            onReady: false,
            useFileCache: true
        };
    </script>
</body>

</html>