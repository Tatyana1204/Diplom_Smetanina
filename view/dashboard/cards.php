<head>
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/dashboard.css" />
</head>
<main>



    <!-- вывод товаров / изменить + удалить -->
    <div class="container">
        <div class="dashboard-links">
            <a class="dashboard-navbar-item link" href="<?php echo URL; ?>/dashboard/products">Продукты</a>
            <a class="dashboard-navbar-item link" href="<?php echo URL; ?>/dashboard/categories">Категории</a>
            <a class="dashboard-navbar-item link" href="<?php echo URL; ?>/dashboard/cards">Карты</a>
        </div>
        <div class="row">
            <div class="col-3 col-lg-3 col-xl-3 ">
                <div class='form-container'>

                    <h4 style="margin-bottom: 3vh;">Добавить карту</h4>
                    <form id="addCardForm" action="dashboard/addCard" method="post">
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="название">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="description" class="form-control" placeholder="описание">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="price" class="form-control" placeholder="цена">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="code" class="form-control" placeholder="код">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="userfile" type="file" id="formFile">
                        </div>
                        <div class="adding-success-text display-none">Карта была успешно добавлена</div>
                        <div class="adding-error-text display-none">Упс, в запросе произошла ошибка</div>
                        <div class="mb-3">
                            <button type="submit" class="btn form-btn">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-9 col-lg-9 col-xl-9 ">
                <div class='list-container'>
                    <h4>Категории</h4>
                    <div class="row no-gutters goods left">
                        <ul class="list-group list-group-flush goods-list margin-top-15">
                            <?php foreach ($this->cards as $card) { ?>

                                <li class="list-group-item">
                                    <div class="product-card" id="<?php echo $card->id; ?>">
                                        <div class="cart-card-price">
                                            <h5 class="total-price">
                                                <?php echo $card->title; ?>
                                            </h5>
                                        </div>

                                        <div class="control-buttons">
                                            <button class="no-border update">
                                                Изменить
                                            </button>
                                            <button class="no-border delete">
                                                Удалить
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item update-form-container display-none">
                                    <div class="update-form">
                                        <form id="<?php echo $card->id; ?>" class="updateCardForm" action="dashboard/updateCard" method="post">
                                            <div class="mb-3">
                                                <input type="text" name="id" class="form-control" value="<?php echo $card->Id; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="title" class="form-control" value="<?php echo $card->title; ?>" placeholder="название">
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="description" rows="5"><?php echo $card->description; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="price" class="form-control" placeholder="цена">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="code" class="form-control" placeholder="код">
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" name="userfile" type="file" id="formFile">
                                            </div>
                                            <div class="updating-success-text display-none">Товар был успешно добавлен</div>
                                            <div class="updating-error-text display-none">Упс, в запросе произошла ошибка</div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn form-btn">Изменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="list-group-item delete-form-container display-none">
                                    <div class="delete-form">
                                        <form id="<?php echo $card->id; ?>" class="deleteCardForm" action="dashboard/deleteCard" method="post">
                                            <div class="mb-3">
                                                <input type="text" name="id" class="form-control" value="<?php echo $card->Id; ?>" readonly>
                                            </div>
                                            <div class="updating-success-text display-none">Товар был успешно удален</div>
                                            <div class="updating-error-text display-none">Упс, в запросе произошла ошибка</div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn form-btn">Удалить</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo URL; ?>/public/js/dashboard.js"></script>