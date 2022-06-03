<head>
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/reg.css" />
</head>
<div class="overlay">
    <form id="register-user" method="post" action="<?php echo URL; ?>/login/confirmRegister">
        <div class="mb-3">
            <input type="text" name="userName" class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="text" name="userLastName" class="form-control" placeholder="ln">
        </div>
        <div class="mb-3">
            <input type="tel" name="tel" class="form-control" placeholder="tel">
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="pass">
        </div>
        <div class="mb-3">
            <input type="submit" class="form-control" value="зарегистроваться">
        </div>
    </form>
</div>
