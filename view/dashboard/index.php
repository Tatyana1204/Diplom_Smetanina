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

                    <h4 style="margin-bottom: 3vh;">Добавить продукт</h4>
                    <form id="addProductForm" enctype="multipart/form-data" action="dashboard/addProduct" method="post">
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="название">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="price" class="form-control" placeholder="цена">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="ml" class="form-control" placeholder="ml">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="sale" class="form-control" placeholder="скидка">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="userfile" type="file" id="formFile" >
                        </div>

                        <select class="form-select" name="category" aria-label="Default select example">
                            <?php foreach ($this->categories as $category) {
                                if ($category->id == 1) { ?>

                                    <option value='<?php echo $category->id; ?>' selected><?php echo $category->title; ?></option>

                                <?php } else { ?>
                                    <option value='<?php echo $category->id; ?>'><?php echo $category->title; ?></option>

                            <?php }
                            } ?>
                        </select>
                        <div class="adding-success-text display-none">Товар был успешно добавлен</div>
                        <div class="adding-error-text display-none">Упс, в запросе произошла ошибка</div>
                        <div class="mb-3">
                            <button type="submit" class="btn form-btn">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-9 col-lg-9 col-xl-9 ">
                <div class='list-container'>
                    <h4>Продукты</h4>
                    <div class="row no-gutters goods left">
                        <ul class="list-group list-group-flush goods-list margin-top-15">
                            <?php foreach ($this->products as $product) { ?>

                                <li class="list-group-item">
                                    <div class="product-card" id="<?php echo $product->productID; ?>">
                                        <div class="product-card-header">

                                            <img class="product-card-image" src="<?php echo $product->img; ?>" alt="product" />

                                            <div class="product-card-title"><?php echo $product->title; ?></div>
                                        </div>
                                        <div class="cart-card-price">
                                            <h4 class="total-price">
                                                <?php echo $product->price; ?>&#8381;
                                            </h4>
                                        </div>
                                        <div class="cart-card-price">
                                            <?php
                                            foreach ($this->categories as $category) {
                                                if ($category->id == $product->categoryID)
                                                    echo $category->title;
                                            }
                                            ?>

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
                                        <form id="update<?php echo $product->productID ?>" enctype="multipart/form-data" class="updateProductForm" action="dashboard/addProduct" method="post">
                                            <div class="mb-3">
                                                <input type="text" name="id" class="form-control" value="<?php echo $product->productID ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="title" class="form-control" value="<?php echo $product->title ?>" placeholder="название">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="price" class="form-control" value="<?php echo $product->price ?>" placeholder="цена">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="ML" class="form-control" value="<?php echo $product->ML ?>" placeholder="ML">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="sale" class="form-control" value="<?php echo $product->sale ?>" placeholder="скидка">
                                            </div>
                                            <div class="mb-3">
												<textarea class="form-control" name="description" rows="5"><?php echo $product->description; ?></textarea>
											</div>
                                            <div class="mb-3">
                                                <input class="form-control" name="userfile" type="file" id="formFile">
                                            </div>
                                            <select class="form-select" name="category" aria-label="Default select example">
                                                <?php foreach ($this->categories as $category) {
                                                    if ($category->id == 1) { ?>

                                                        <option value='<?php echo $category->id; ?>' selected><?php echo $category->title; ?></option>

                                                    <?php } else { ?>
                                                        <option value='<?php echo $category->id; ?>'><?php echo $category->title; ?></option>

                                                <?php }
                                                } ?>
                                            </select>
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
                                        <form id="<?php echo $product->productID ?>" class="deleteProductForm" action="dashboard/addProduct" method="post">
                                            <div class="mb-3">
                                                <input type="text" name="id" class="form-control" value="<?php echo $product->productID ?>" readonly>
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