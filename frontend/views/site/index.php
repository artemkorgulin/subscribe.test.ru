<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовый проект</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Тестовый проект">
    <meta property="og:description" content="">
    <meta property="og:url" content="https://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">

    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet">

    <link href="//<?=$_SERVER['HTTP_HOST'] ?>/fonts/fonts.css" rel="stylesheet">
    <link href="//<?=$_SERVER['HTTP_HOST'] ?>/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script><![endif]-->
    <!--[if lte IE 9]><script src="//phpbbex.com/oldies/oldies.js" charset="utf-8"></script><![endif]-->

    <!--[if lt IE 9]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><![endif]-->
    <!--[if gte IE 9]><!--><script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script><!--<![endif]-->
</head>
<body>

<header>
    <div class="container">
        <nav>
            <a href="/" class="logo"><img src="//<?=$_SERVER['HTTP_HOST'] ?>/img/logo.svg" width="80" alt=""></a>
            <div class="right-side">
                <?php /* <a href="<?=\yii\helpers\Url::to(['site/login'])?>" class="logIn">Вход</a>
                <a href="<?=\yii\helpers\Url::to(['bt/reg'])?>" class="signUp">Регистрация</a> */ ?>
            </div>
        </nav>
    </div>
</header>

<div class="wrapper">
    <div class="container">
        <div class="row wrapper__row">
            <h1>Тестовый проект о подписчиках</h1>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <nav>
            <a href="/" class="logo"><img src="//<?=$_SERVER['HTTP_HOST'] ?>/img/logo.svg" width="80" alt=""></a>
            <div class="right-side">
                <span class="copy">&copy;&nbsp;Тестовый проект <?php echo date("Y") ?></span>
                <a href="mailto:test@subscribe.test.ru" class="link">test@subscribe.test.ru</a>
            </div>
        </nav>
    </div>
</footer>

<!-- Плагины и хелперы -->
<script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>