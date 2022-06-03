<head>
   <link rel="stylesheet" href="<?php echo URL; ?>/public/css/reg.css" />
</head>
<div class="overlay">
   <form action="https://localhost/coffee/login/getLog" method="post">
      <div class="con">
         <!--     Start  header Content  -->
         <div class="hid-form">
            <h2>Log In</h2>
            <!--     A welcome message or an explanation of the login form -->
            <p>login here using your username and password</p>
         </div>
         <br>
         <div class="field-set">

            <!--   user name -->
            <span class="input-item">
               <i class="fa fa-user-circle"></i>
            </span>
            <!--   user name Input-->
            <input class="form-input" id="txt-input" name="login" type="text" placeholder="@UserName" required>

            <br>

            <!--   Password -->

            <span class="input-item">
               <i class="fa fa-key"></i>
            </span>
            <!--   Password Input-->
            <input class="form-input" type="password" placeholder="Password" id="pwd" name="password" required>

            <!-- ЗДЕСЬ ВЫВОД СООБЩЕНИЯ ОБ ОШИБКЕ -->
            <?php if (isset($this->data)) : ?>
               <div class="mb-3 ">
                  <p>Неправильный логин или\и пароль</p>
               </div>
            <?php endif; ?>
            <!-- ЗДЕСЬ ВЫВОД СООБЩЕНИЯ ОБ ОШИБКЕ -->


            <!--      Show/hide password  -->
            <span>
               <i class="fa fa-eye" aria-hidden="true" type="button" id="eye">eye</i>
            </span>


            <br>
            <!--        buttons -->
            <!--      button LogIn -->
            <button class="log-in button" onClick="getValue()"> Log In </button>
         </div>
         <div class="other">
            <!--      Forgot Password button-->
            <button class="btn submits frgt-pass">Forgot Password</button>
            <button class="btn btn-outline submits sign-up"><a class="non-decorated" href="<?php echo URL; ?>/login/register">Sign Up</a>
               <i class="fa fa-user-plus" aria-hidden="true"></i>
            </button>
         </div>
      </div>
   </form>
</div>
<script src="<?php echo URL; ?>/public/js/reg1.js"></script>