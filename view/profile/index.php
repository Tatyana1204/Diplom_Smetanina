<link rel="stylesheet" href="<?php echo URL; ?>/public/css/profile.css" />

<main>
    <div class="container">
        <div class="row no-gutters goods left">
            <ul class="list-group list-group-flush orders-list margin-top-15">

                <?php foreach ($this->orders as $order) { ?>
                    <div class="profile-order-card">
                        <div class="profile-order-card-header">
                            <div class="card-info">
                                <div>
                                    <h3>Заказ <?php echo $order->orderId ?> </h3>
                                </div>
                                <div>Сумма: <?php echo $order->orderSum ?> </div>
                            </div>
                        </div>
                        <hr class="line">
                        <ul class="list-group list-group-flush" style=" width: 100%;">

                            <?php foreach ($order->products as $product) { ?>
                                <li class="list-group-item" style=" width: 100%;">
                                    <div class="product-card-header">
                                        <div class="product-title">
                                            <img src="<?php echo $product->img ?> " class="good-card-img">
                                            <div class="product-card-title"><?php echo $product->title ?></div>
                                            <div>Размер: <?php echo $product->ML ?></div>
                                            <div>Количество: <?php echo $product->count ?></div>
                                        </div>
                                        <div class="product-card-price">
                                            <div>
                                                <h5> <?php echo $product->price ?></h5>
                                            </div>
                                        </div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
            </ul>
        </div>
    </div>
</main>