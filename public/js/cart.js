// localStorage.clear();


let products = [];
if (localStorage.getItem('products')) {
    products = JSON.parse(localStorage.getItem('products'));
    // console.log(products);
    showCartItems(products);
    getTotalSum(products);

} else {
    showEmptyCartImage()
}



//отображение всех элнментов корзины

function showCartItems(products) {
    //добавление шапки
    $('.cart-items-list').append('<li class="cart-header"><h3>Корзина</h3><button class="clear-cart-btn no-border" style="color: #A0B1C5">Очистить корзину</button></li>');

    products.forEach(product => {

        $('.cart-items-list').append('<li class="list-group-item"><div class="cart-card" id="' + product.productId + '"><div class="cart-card-header"><div class="cart-card-image"> <img id="' + product.productId + '" src="' + product.img + '" alt="rover" /></div><div class="cart-card-title">' + product.title + '</div></div><div class="cart-card-buttons"><div id="' + product.productId + '" class="icon-s decrease"><img class="icon" src="https://img.icons8.com/android/24/000000/minus.png"></img></div><div class="count">' + product.count + '</div><div id="' + product.productId + '" class="icon-s increase"><img class="icon" src="https://img.icons8.com/android/24/000000/plus.png"></img></div></div><div class="cart-card-price"><div><h4 class="total-price">' + product.price * product.count + ' руб</h4></div><div><span class="small-count">' + product.count + '</span> x <span class="small-price"> ' + product.price + '</span> руб</div><button id="' + product.productId + '" class="no-border delete">Удалить</button></div></div></li>');
    });

}
//подсчет общей стоимости

function getTotalSum(products) {
    let totalSum = 0;
    products.forEach(product => {
        totalSum += product.price * product.count;
    });

    console.log(totalSum);
    $('.total-sum-value')[0].textContent = totalSum;

}
function showEmptyCartImage() {
    //TO DO: поменять путь до картинки
    $('.cart-items-list').append('<div class="bg-image"><img src="https://localhost/s_shop/public/images/empty-cart.png"/></div>');
}
//удаление всех товаров
$('.clear-cart-btn').on("click", function (obj) {

    setProducts([]);

    items = $('.cart-items-list').children();

    for (let item of items) {
        item.remove();
    }
    showEmptyCartImage()
});


//увеличения количества товара
$('.increase').on("click", function (obj) {
    let id = $(this)[0].id;
    let countContainer = $(this)[0].previousSibling;
    let productSum = $(this)[0].parentElement.parentElement.children[2].children[0];
    let countPrice = productSum.nextSibling.children[0];


    countContainer.textContent = Number(countContainer.textContent) + 1;
    products = getProducts();

    products.forEach(product => {
        if (product.productId == id) {
            product.count++;
            //изменить количество и сумму на карточке товара
            productSum.innerHTML = '<h4 class="total-price">' + product.count * product.price + ' руб</h4>';;
            countPrice.textContent = product.count;
        }

    });


    getTotalSum(products);
    setProducts(products);


});

//уменьшение количества товара
$('.decrease').on("click", function (obj) {
    let id = $(this)[0].id;
    let countContainer = $(this)[0].nextSibling;

    console.log(countContainer);
    if (countContainer.textContent == 1) {
        deleteCartItem($(this)[0], id);
    }
    else {
        let productSum = $(this)[0].parentElement.parentElement.children[2].children[0];
        let countPrice = productSum.nextSibling.children[0];
        countContainer.textContent = Number(countContainer.textContent) - 1;
        products = getProducts();
        console.log(productSum);
        products.forEach(product => {
            if (product.productId == id) {
                product.count--;
                productSum.innerHTML = '<h4 class="total-price">' + product.count * product.price + ' руб</h4>';
                countPrice.textContent = product.count;
            }
        });

        setProducts(products);
        getTotalSum(products);
    }

});
// удаление товара
$('.delete').on("click", function (obj) {
    let id = $(this)[0].id;

    deleteCartItem($(this)[0], id);


});

function deleteCartItem(obj, id) {
    parentContainer = obj.parentElement.parentElement.parentElement;
    parentContainer.remove();

    products = getProducts();
    let product = products.find(product => product.productId == id);
    let index = products.indexOf(product);


    products.splice(index, 1);

    setProducts(products);

    getTotalSum(products);
}

function getProducts() {
    return JSON.parse(localStorage.getItem('products'));
}
function setProducts(products) {

    localStorage.setItem('products', JSON.stringify(products));
}

