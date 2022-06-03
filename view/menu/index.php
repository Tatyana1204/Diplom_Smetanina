<head>
 <link rel="stylesheet" href="<?php echo URL; ?>/public/css/menu.css" />
</head>
<body>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-3 groupcategory">
                <ul class="list-group categorylist">
                    <?php foreach ($this->categories as $category) { ?>
                        <btn class=" categorybtn"><a class="categorycart" href="<?php echo URL; ?>/menu/categorize/<?php echo $category->id; ?>"><?php echo $category->title; ?></btn></a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-9">
            <div class="row no-gutters goods">
                    <?php foreach ($this->products as $product) { ?>
                        <div class="card" style="width: 18rem;">
                        <h5 class="card-title1"><?php echo $product->title; ?></h5>
                           <a  href="<?php echo URL;?>/menu/getProd/<?php echo $product->productID;?>"><img src="<?php echo $product->img; ?>" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <p class="card-title"><?php echo $product->price; ?> руб.</p>
                                <button id="<?php echo $product->productID ?>" class="btn categorybtntwo btn1 btn-outline-danger add-to-cart-btn">Добавить в корзину</button>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo URL; ?>/public/js/add_to_cart.js"></script>