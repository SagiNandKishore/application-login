<?php
  # include "dbh.classes.php";


  class Login extends Dbh {

    protected function get_user($user_name, $user_password) {
      $stmt = $this->connect()->prepare('SELECT USER_PASSWORD FROM USERS WHERE user_name = ?;');

      if (! $stmt->execute(array($user_name)))
      {
        $stmt = null;
        header("location: ../app-login-failure.php");
        exit();
      }

      $result;

      if ($stmt->rowCount() == 0) {
        $result = false;
        $stmt = null;
        $_SESSION["ERROR"] = "INVALID_USER";
        $_SESSION["ERROR_MESSAGE"] = "User [".$user_name."] does not exist in application."; 
        header("location: ../app-login-failure.php");
        exit();
      }

      $password_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $password_check_result = password_verify($user_password, $password_hashed[0]["USER_PASSWORD"]);

      if ($password_check_result == false) {
        $result = false;
        $stmt = null;
        $_SESSION["ERROR"] = "INVALID_CREDENTIALS";
        $_SESSION["ERROR_MESSAGE"] = "Credentials provided for User [".$user_name."] are invalid."; 
        header("location: ../app-login-failure.php");
        exit();
      }      
      
      $stmt=null;
      return $result;

    }

}


?>