

$('.update').on("click", function (obj) {
    console.log('dkn ');
    let container = obj.target.parentNode.parentNode.parentNode.nextElementSibling;
    container.classList.toggle('display-none');
  
});

$('.delete').on("click", function (obj) {
    
    
    let container = obj.target.parentNode.parentNode.parentNode.nextElementSibling.nextElementSibling;
    console.log(container);
    container.classList.toggle('display-none');
  
});

$('.updateProductForm').submit(function(e) {
    
    e.preventDefault();
    let successMessage = $(this)[0].children[5];
    let errorMessage = $(this)[0].children[6];

    let formData = new FormData($(this)[0]);

    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/updateProduct',
        data: formData,
        success: function(response)
        {
            console.log(response);
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                }  
            
        },
        cache: false,
        contentType: false,
        processData: false
   });
 });

 
$('#addProductForm').submit(function(e) {
    
    e.preventDefault();

    let successMessage = $(this)[0].children[4];
    let errorMessage = $(this)[0].children[5];
//    console.log($(this)[0][2].files[0]);
//    console.log($(this).serializeArray());
   let formData = new FormData($(this)[0]);
  // formData.append('file',$(this)[0][2].files[0]);
   console.log(formData);

    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/addProduct',
        data: formData,
        success: function(response)
        {
            console.log(response);
            
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                     // перезагрузка страницы
                    document.location.reload();
                } 
            
        },
        cache: false,
        contentType: false,
        processData: false
   });
 });

 
$('.deleteProductForm').submit(function(e) {
    
    e.preventDefault();
    console.log( $(this)[0].children);
    let successMessage = $(this)[0].children[1];
    let errorMessage = $(this)[0].children[2];

    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/deleteProduct',
        data: $(this).serializeArray(),
        success: function(response)
        {
            console.log(response);
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                    console.log($(this));
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                }  
            
        }
   });
 });

//  КАТЕГОРИИ


$('.updateCategoryForm').submit(function(e) {
    
    e.preventDefault();
//    console.log($(this)[0][2].files[0]);
//    console.log($(this).serializeArray());
   let formData = new FormData($(this)[0]);
  
    let cardParent =  $(this)[0].parentNode.parentNode.previousElementSibling;
    let titleInput = cardParent.children[0].children[0].children[0];
    
    let successMessage = $(this)[0].children[2];
   
    let errorMessage = $(this)[0].children[3];
    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/updateCategory',
        data: formData,
        success: function(response)
        {
            console.log(response);
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                  
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');

                    titleInput.innerText = jsonData.title;
                }  
            
        },
        cache: false,
        contentType: false,
        processData: false
   });
 });

 
$('#addCategoryForm').submit(function(e) {
    
    e.preventDefault();

    let successMessage = $(this)[0].children[4];
    let errorMessage = $(this)[0].children[5];
   
   let formData = new FormData($(this)[0]);
   console.log(formData);
   
    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/addCategory',
        data: formData,
        success: function(response)
        {
            console.log(response);
            
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                   
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                     // перезагрузка страницы
                    // document.location.reload();

                } 
            
        },
        cache: false,
        contentType: false,
        processData: false
   });
 });

 
$('.deleteCategoryForm').submit(function(e) {
    console.log( $(this)[0].children);
    e.preventDefault();
 
    let successMessage = $(this)[0].children[1];
    let errorMessage = $(this)[0].children[2];

    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/deleteCategory',
        data: $(this).serializeArray(),
        success: function(response)
        {
            console.log(response);
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                    console.log($(this));
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                }  
            
        }
   });
 });

 //  КАРТЫ


$('.updateCardForm').submit(function(e) {
    
    e.preventDefault();
//    console.log($(this)[0][2].files[0]);
//    console.log($(this).serializeArray());
   let formData = new FormData($(this)[0]);
  
    let cardParent =  $(this)[0].parentNode.parentNode.previousElementSibling;
    let titleInput = cardParent.children[0].children[0].children[0];
    
    let successMessage = $(this)[0].children[2];
   
    let errorMessage = $(this)[0].children[3];
    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/updateCard',
        data: formData,
        success: function(response)
        {
            console.log(response);
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                  
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');

                    titleInput.innerText = jsonData.title;
                }  
            
        },
        cache: false,
        contentType: false,
        processData: false
   });
 });

 
$('#addCardForm').submit(function(e) {
    
    e.preventDefault();

    let successMessage = $(this)[0].children[4];
    let errorMessage = $(this)[0].children[5];
   
   let formData = new FormData($(this)[0]);
   console.log(formData);
   
    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/addCard',
        data: formData,
        success: function(response)
        {
            console.log(response);
            
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                   
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                     // перезагрузка страницы
                    // document.location.reload();

                } 
            
        },
        cache: false,
        contentType: false,
        processData: false
   });
 });

 
$('.deleteCardForm').submit(function(e) {
    console.log( $(this)[0].children);
    e.preventDefault();
 
    let successMessage = $(this)[0].children[1];
    let errorMessage = $(this)[0].children[2];

    $.ajax({
        type: "POST",
        url: 'https://localhost/coffee/dashboard/deleteCard',
        data: $(this).serializeArray(),
        success: function(response)
        {
            console.log(response);
            let jsonData = JSON.parse(response);
                if (jsonData.status == "error"){
                    errorMessage.classList.remove('display-none');
                    successMessage.classList.add('display-none');
                } else {
                    console.log($(this));
                    successMessage.classList.remove('display-none');
                    errorMessage.classList.add('display-none');
                }  
            
        }
   });
 });
