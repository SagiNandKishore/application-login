<?php
  session_start();

  class Dbh {

    protected function connect() {
      try {
        $db_user_name = "root";
        $db_user_password = "root";
        $db_host = "localhost";
        $db_name = "app_data";

        $connection = new PDO('mysql:host=localhost;dbname=app_data', $db_user_name, $db_user_password);

        return $connection;

      } catch (PDOException $e) {
        $_SESSION['ERROR'] = "Database Error";
        $_SESSION['ERROR_MESSAGE'] = "Error occured during application login [".$e->getMessage()."].";
        header("location: ../app-signup-failure.php");
        die();
      }
    }
  }
?>