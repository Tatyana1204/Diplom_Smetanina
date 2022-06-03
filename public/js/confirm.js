let cardId = 0;
$('#confirmForm').submit(function (e) {
    e.preventDefault();

    console.log(cardId);
    // console.log( localStorage.getItem('products'));

    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/cart/confirmOrder',
        data: { 'products': localStorage.getItem('products'), 'orderDetails': $(this).serializeArray(), 'cardId': cardId  },
        success: function (response) {
            console.log(response);
            let jsonData = JSON.parse(response);

            if (jsonData.status == 'success') {
                 window.location.replace("https://localhost/coffee/cart/Order/" + jsonData.orderId);
            }
            else {
                if (jsonData.error == 'user not logged')
                 window.location.replace('https://localhost/coffee/login/')
            
        }

        }
    });
});

// Код для проверки кода подарочной карты

$('#promoForm').submit(function (e) {

    e.preventDefault();

    console.log($(this).serialize());
    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/cart/checkPromocode',
        data: $(this).serialize(),
        success: function (response) {

            let jsonData = JSON.parse(response);
            if (jsonData.status == "error") {
                console.log('error');
                cardId = 0;
            } else {
                cardId = jsonData.id;
                console.log(cardId);
            }

        }
    });
});