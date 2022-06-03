
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
   <link rel="stylesheet" href="<?php echo URL; ?>/public/css/reg.css" />
 </head>
<div class="overlay">
<form>
   <div class="con">
   <!--     Start  header Content  -->
   <header class="head-form">
      <h2>Log In</h2>
      <!--     A welcome message or an explanation of the login form -->
      <p>login here using your username and password</p>
   </header>
   <br>
   <div class="field-set">

      <!--   user name -->
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
        <!--   user name Input-->
         <input class="form-input" id="txt-input" type="text" placeholder="@UserName" required>

      <br>

           <!--   Password -->

      <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
      <!--   Password Input-->
      <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>

<!--      Show/hide password  -->
     <span>
        <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye">eye</i>
     </span>


      <br>
<!--        buttons -->
<!--      button LogIn -->
      <button class="log-in"> Log In </button>
   </div>
   <div class="other">
<!--      Forgot Password button-->
      <button class="btn submits frgt-pass">Forgot Password</button>
      <button class="btn submits sign-up">Sign Up
      <i class="fa fa-user-plus" aria-hidden="true"></i>
      </button>
   </div>
  </div>
</form>
</div>
 <script src="<?php echo URL; ?>/public/js/reg1.js"></script>
