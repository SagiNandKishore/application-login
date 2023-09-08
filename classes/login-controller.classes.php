<?php

  session_start();

  class LoginController extends Login{

    private $user_name;
    private $user_password;

    public function __construct($user_name, $user_password) {
      $this->user_name = $user_name;
      $this->user_password = $user_password;
    }

    public function loginUser() {
      $empty_key = $this->is_input_empty();

      if ($empty_key !== "none") {
        $_SESSION['ERROR'] = "Invalid User";
        $_SESSION['ERROR_MESSAGE'] = "Username cannot be empty.";
        header("location: ../app-login-failure.php");
        exit();
      }

      $this->get_user($this->user_name, $this->user_password);
    }

    private function is_input_empty() {
      $empty_key = "none";

      switch (true) {
        case(empty($this->user_name)):
          $empty_key = "user_name";
          break;
        case(empty($this->user_password)):
          $empty_key = "user_password";
          break;        
      }
        return $empty_key;
    }
  }
?>