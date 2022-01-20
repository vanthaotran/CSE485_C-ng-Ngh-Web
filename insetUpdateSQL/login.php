<?php
  include("template/header.php");
?>

<form class="form-signin mt-10" action="processLogin.php" method="post">
      
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="txtEmail">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="txtPassWord">
        <?php

            if(isset($_GET['error'])) {
              echo "<h5 style = 'color: red;'> {$_GET['error']} </h5>";
            }


            if(isset($_GET['warning'])) {
                echo "<h5 style = 'color: red;'> {$_GET['warning']} </h5>";
            }
        ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnSignIn">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> 
    </form>

    <?php
  include("template/footer.php");
?> 