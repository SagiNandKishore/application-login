<?php

  include "../classes/dbh.classes.php";
  include "../classes/app-login.classes.php";
  include "../classes/login-controller.classes.php";


  if(isset($_POST["login"]))
  {
    print_r($_POST["login"]);
    $user_name = $_POST["u_username"];
    $user_password = $_POST["u_password"];
    
    $login = new LoginController($user_name, $user_password);

    $login->loginUser();

    header("location: ../app-login-successful.html");
  }

?>