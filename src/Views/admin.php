<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link href="/../css/account.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>


</head>
<body class="admin">
<div class="hallow">
    <p>Добро пожаловать в личный кабинет, <?php echo $name ?>!</p>
</div>
<div class="col-2">
<button type="button" class="btn btn-link "><a class="nav-link" href="/account/logout">Выйти</a></button>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active help_js" name="picture" id="home-tab" data-toggle="tab" href="#picture" role="tab"
           aria-controls="home"
           aria-selected="true">Фотографии</a>
    </li>
    <li class="nav-item">
        <a class="nav-link help_js" name="recommendation" id="profile-tab" data-toggle="tab" href="#recommendation"
           role="tab"
           aria-controls="profile"
           aria-selected="false">Советы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link help_js" name="comments" id="comments-tab" data-toggle="tab" href="#comments" role="tab"
           aria-controls="comments"
           aria-selected="false">Отзывы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link help_js" name="price" id="price-tab" data-toggle="tab" href="#price" role="tab"
           aria-controls="price"
           aria-selected="false">Услуги и цены</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" name="aboutmaster" id="aboutmaster-tab" data-toggle="tab" href="#aboutmaster" role="tab"
           aria-controls="aboutmaster"
           aria-selected="false">О себе</a>
    </li>
</ul>


<div class="tab-content " id="myTabContent">

    <div class=" tab-pane fade show active" id="picture" role="tabpanel" aria-labelledby="home-tab">
        <div class=" d-flex flex-row">
            <div class="margin-50  col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="add_picture-tab" data-toggle="pill" href="#add_picture" role="tab"
                       aria-controls="add_picture" aria-selected="true">Добавить</a>

                    <a class="nav-link" id="delete_picture-tab" data-toggle="pill" href="#delete_picture" role="tab"
                       aria-controls="delete_picture" aria-selected="false">Все записи</a>
                </div>
            </div>

            <div class="tab-content  margin-50 offset-1 col-6" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="add_picture" role="tabpanel"
                     aria-labelledby="add_picture-tab"><?php require_once "add_picture.php" ?></div>

                <div class="tab-pane fade" id="delete_picture" role="tabpanel"
                     aria-labelledby="delete_picture-tab"><?php require_once "delete_picture.php" ?></div>
            </div>
        </div>
    </div>




    <div class=" tab-pane fade" id="recommendation" role="tabpanel" aria-labelledby="recommendation-tab">
        <div class=" d-flex flex-row">
            <div class="margin-50  col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="add_recommendation-tab" data-toggle="pill" href="#add_recommendation" role="tab"
                       aria-controls="add_recommendation" aria-selected="true">Добавить</a>

                    <a class="nav-link" id="delete_recommendation-tab" data-toggle="pill" href="#delete_recommendation" role="tab"
                       aria-controls="delete_recommendation" aria-selected="false">Все записи</a>
                </div>
            </div>

            <div class="tab-content  margin-50 offset-1 col-6" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="add_recommendation" role="tabpanel"
                     aria-labelledby="add_recommendation-tab"><?php require_once "add_recom.php" ?></div>

                <div class="tab-pane fade" id="delete_recommendation" role="tabpanel"
                     aria-labelledby="delete_recommendation-tab"><?php require_once "delete_recommendation.php" ?></div>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
        <div class=" d-flex flex-row">
            <div class="margin-50  col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="add_comments-tab" data-toggle="pill" href="#add_comments" role="tab"
                       aria-controls="add_comments" aria-selected="true">Добавить</a>

                    <a class="nav-link" id="delete_comments-tab" data-toggle="pill" href="#delete_comments" role="tab"
                       aria-controls="delete_comments" aria-selected="false">Все записи</a>
                </div>
            </div>

            <div class="tab-content  margin-50 offset-1 col-6" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="add_comments" role="tabpanel"
                     aria-labelledby="add_comments-tab"><?php require_once "add_comments.php" ?></div>

                <div class="tab-pane fade" id="delete_comments" role="tabpanel"
                     aria-labelledby="delete_comments-tab"><?php require_once "delete_comments.php" ?></div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
        <div class=" d-flex flex-row">
            <div class="margin-50  col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="add_price-tab" data-toggle="pill" href="#add_price" role="tab"
                       aria-controls="add_price" aria-selected="true">Добавить</a>

                    <a class="nav-link" id="delete_price-tab" data-toggle="pill" href="#delete_price" role="tab"
                       aria-controls="delete_price" aria-selected="false">Все записи</a>
                </div>
            </div>

            <div class="tab-content  margin-50 offset-1 col-6" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="add_price" role="tabpanel"
                     aria-labelledby="add_price-tab"><?php require_once "add_price.php" ?></div>

                <div class="tab-pane fade" id="delete_price" role="tabpanel"
                     aria-labelledby="delete_price-tab"><?php require_once "delete_price.php" ?></div>
            </div>
        </div>
    </div>

    <div class=" tab-pane fade" id="aboutmaster" role="tabpanel" aria-labelledby="aboutmaster-tab">
        <div class="margin-50 offset-3 col-6">
            <?php require_once "about_master.php" ?>
        </div>
    </div>

</div>



<script src="/js/del_pic.js"></script>
<script src="/js/m_comment.js"></script>
</body>
</html>