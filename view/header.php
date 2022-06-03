<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/header.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/cart.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body>
   
    <div class="header">
        <div class="btn-group" role="group">
            <a href="<?php echo URL; ?>/"> <img src="<?php echo URL; ?>/public/images/logo.jpeg" width="150px" height="150px"></a>

            <div class="dropdown">
                <a class="btn" type="button " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Меню
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php foreach ($this->categories as $category) { ?>
                        <a class="dropdown-item" href="<?php echo URL; ?>/menu/categorize/<?php echo $category->id; ?>"><?php echo $category->title; ?></a>
                    <?php } ?>
                </ul>
            </div>

            <a class="mur-without-margin" href="<?php echo URL; ?>/menu/getCards/"> Подарочные карты</a>
            <a class="mur" href="<?php echo URL; ?>/cart"> Корзина</a>
            <?php if (Session::get('loggedIn') == true) : ?>

                <a class="btn " type="button" type="button" href="<?php echo URL; ?>/dashboard/products">
                    <img src="<?php echo URL; ?>/public/images/profile2.jpeg">
                </a>


                <a class="btn " type="button" type="button" href="<?php echo URL; ?>/login/">
                    <img src="<?php echo URL; ?>/public/images/profile1.jpeg">
                </a>



            <?php else : ?>
                <button class="btn " type="button" type="button"> <a href="<?php echo URL; ?>/login/"><img src="<?php echo URL; ?>/public/images/profile1.jpeg"></a></button>

            <?php endif; ?>
        </div>
    </div>