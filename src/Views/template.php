<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/comment.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />

    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

</head>
<body>

<div class="header">
    <div class="info-header">
       <div class="phone">
            <a href="/info/contacts" class="contacts_href">
                <p class="under-text">
                    Viber/WhatsApp/Telegram
                </p>
                <p>+7-921-874-08-04</p>
                <p>+7-911-154-55-20</p>
            </a>
           <div class="reg_now"><a href="https://dkd.su/g82529">Онлайн запись</a></div>
        </div>

        <a class="container-logo" href="/info/about"><img class="logo" src="/img/1P.png"> </a>

        <div class="adress">
            <a href="/info/contacts " class="contacts_href" >
                <p class="under-text">Наши адреса:</p>
                <p>СПб, пр.Юрия Гагарина, дом 23</p>
                <p>Колпино, ул.Тверская, дом 34, ТК"Ока"</p>
            </a>
        </div>
    </div>
    <div class="menu-main">

        <div class="item">
            <a href="/info/about">Главная</a>
        </div>
        <div class="item">
            <a href="/comments/show">Отзывы</a>
        </div>
        <div class="item">
            <a href="/price">Услуги и цены</a>
        </div>
        <div class="item">
            <a href="/recommendation">Советы</a>
        </div>
        <div class="item">
            <a href="/info/masters">Мастера</a>
        </div>
        <div class="item">
            <a href="/info/contacts">контакты</a>
        </div>
    </div>


</div>

<div class="content">
    <?php include_once $content ?>
</div>
<script src='/../js/quill_temp.js'></script>
</body>
</html>