<?php
  # include "dbh.classes.php";


  class Signup extends Dbh {

    protected function check_user_in_database($user_name, $user_email) {
      $stmt = $this->connect()->prepare('SELECT USER_ID FROM USERS WHERE user_name = ? or user_email = ?;');

      if (! $stmt->execute(array($user_name, $user_email)))
      {
        $stmt = null;
        header("location: ../app-signup-failure.html");
        exit();
      }

      $result;

      if ($stmt->rowCount() > 0) {
        $result = false;
      }
      else{
        $result = true;
      }

      return $result;

    }

    protected function create_user($user_name, $first_name, $last_name, $user_email, $user_password) {
      $stmt = $this->connect()->prepare('INSERT INTO USERS (user_name, first_name, last_name, user_email, user_password) VALUES (?, ?, ?, ?, ?);');

      $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
      if (! $stmt->execute(array($user_name, $first_name, $last_name, $user_email, $hashed_password)))
      {
        $stmt = null;
        header("location: ../app-signup-failure.html");
        exit();
      }

      $stmt = null;
    }
  }


?>