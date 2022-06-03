<head>
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/cards.css" />
</head>

<body>
    <p class="card-text"><?php echo $this->cards[0]->description; ?></p>
    <div class="row2 no-gutters goods flex">
        <?php foreach ($this->cards as $cards) { ?>
            <div class="card" style="width: 25rem;">
                <h5 class="card-title1"><?php echo $cards->title; ?></h5>
                <img src="<?php echo $cards->img; ?>" class="card-img-top" id="prod" alt="неуд">

                <div class="card-body">
                    <div><?php echo $cards->price ?> руб</div>
                    <button id="<?php echo $cards->Id; ?>" class="btn btn1 btn-outline-danger add-to-cart-btn card-title2">Добавить в корзину</button>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<script src="<?php echo URL; ?>/public/js/add_card_to_cart.js"></script>

</html>