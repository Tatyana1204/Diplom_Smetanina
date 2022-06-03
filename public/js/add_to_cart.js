//  localStorage.clear();

$('.add-to-cart-btn').on("click", function (obj) {

   
    let button = $(this)[0];
    button.textContent = "В корзине";
    
    let id = button.id;
    let price = button.previousElementSibling.textContent;
    let title = button.parentElement.parentElement.firstElementChild.textContent;
    let imgSrc = button.parentElement.parentElement.children[1].children[0].src;

    //удаление лишних символов из цены
    price= price.substring(0, price.length - 1);
    price = price.replace(/[a-zа-яё]/gi, '');

    addProduct(id, title, price, imgSrc, 1);
    
});
function addProduct(productId, title, price, img, count) {
    let products = [];
    if (localStorage.getItem('products')) {
        products = JSON.parse(localStorage.getItem('products'));
    }

    if (products.filter(product => product.productId == productId).length) {
        products.forEach(element => {
            console.log(element);
            if (element.productId == productId)
                element.count++;
        });
    } else
        products.push({ 'productId': productId, 'title': title, 'price': price, 'img': img, 'count': count });

    localStorage.setItem('products', JSON.stringify(products));

    console.log(localStorage.getItem('products'));
}
