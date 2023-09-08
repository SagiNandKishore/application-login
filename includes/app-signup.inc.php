<?php

  include "../classes/dbh.classes.php";
  include "../classes/app-signup.classes.php";
  include "../classes/signup-controller.classes.php";


  if(isset($_POST["signup"]))
  {
    print_r($_POST["signup"]);
    $first_name = $_POST["u_firstname"];
    $last_name = $_POST["u_lastname"];
    $user_name = $_POST["u_username"];
    $user_email = $_POST["u_email"];
    $user_password = $_POST["u_password"];
    $user_repeat_password = $_POST["u_repeat_password"];
    
    $signup = new SignupController($first_name, $last_name, $user_name, $user_email, $user_password, $user_repeat_password);

    $signup->signupUser();

    header("location: ../app-signup-successful.html?error=none");

  }
?>