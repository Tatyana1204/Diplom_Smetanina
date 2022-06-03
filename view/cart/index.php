<main>
    <div class="container">

        <div class="row">
            <div class="col-10 col-lg-8 col-xl-8">
                <div class="row no-gutters goods left">
                    <ul class="list-group list-group-flush cart-items-list margin-top-15">



                    </ul>
                </div>
            </div>
            <div class="col-4 col-xl-3 d-none d-lg-block rigth">
                <ul class="list-group list-group-flush margin-top-15">
                    <li class="list-group-item">
                        <div class="total-container">
                            Сумма товаров <div class="total-sum-value"></div>
                        </div>
                    </li>


                    <li class="list-group-item" style="background-color:#82E0AA;">
                        <div class="total-container pay-container">
                            К оплате <div class="pay-sum-value"></div>
                        </div>
                    </li>
                    <div class="is-promocode"> <span>код подарочной карты</span>
                        <div class="display-promocode">
                            <form id="promoForm" action="cart/checkPromocode" method="post">
                                <input type="text" name="promocode" class="form-control" placeholder="код">

                                <button type="submit" id="promocode-btn" class="btn">
                                    добавить
                                </button>
                            </form>
                            <!-- <span class="error-message">Промокод недействителен</span> -->
                        </div>
                    </div>
                    <li class="list-group-item">

                        <div class="issue-point"> <span style="text-decoration: none !important">пункт выдачи:</span>

                            <form id="confirmForm" action="cart/confirm" method="post">

                                <!-- Выбор пункта выдачи -->
                                <div class="mb-3">
                                    <select id="pickup" name='pickipPoint' class="form-select">
                                        <?php foreach ($this->points as $point) { ?>

                                            <option value="<?php echo $point->id ?>"><?php echo $point->address ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" id="pickup-btn" class="btn">
                                    оформить заказ
                                </button>
                            </form>

                        </div>
                    </li>

            </div>

        </div>
    </div>
    <div>
</main>
<script src="<?php echo URL; ?>/public/js/cart.js"></script>
<script src="<?php echo URL; ?>/public/js/confirm.js"></script>