<?php
  session_start();

  class SignupController extends Signup{

    private $first_name;
    private $last_name;
    private $user_name;
    private $user_email;
    private $user_password;
    private $user_repeat_password;

    public function __construct($first_name, $last_name, $user_name, $user_email, $user_password, $user_repeat_password) {
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->user_name = $user_name;
      $this->user_email = $user_email;
      $this->user_password = $user_password;
      $this->user_repeat_password = $user_repeat_password;
    }

    public function signupUser() {
      $empty_key = $this->is_input_empty();

      if ($empty_key !== "none") {
        $_SESSION['ERROR'] = "Empty input provided";
        $_SESSION['ERROR_MESSAGE'] = "Please provide a value for [".$empty_key."]";
        header("location: ../app-signup-failure.php");
        exit();
      }

      if (! $this->is_username_valid()) {
        $_SESSION['ERROR'] = "Invalid Username";
        $_SESSION['ERROR_MESSAGE'] = "Username [".$this->user_name."] does not meet the UserName requirements";
        header("location: ../app-signup-failure.php");
        exit();
      }

      if (! $this->is_email_address_valid()) {
        $_SESSION['ERROR'] = "Invalid Email";
        $_SESSION['ERROR_MESSAGE'] = "Please provide a valid email address";
        header("location: ../app-signup-failure.php");
        exit();
      }

      if (! $this->do_passwords_match()) {
        $_SESSION['ERROR'] = "Passwords Mismatch";
        $_SESSION['ERROR_MESSAGE'] = "Passwords do not match";
        header("location: ../app-signup-failure.php");
        exit();
      }

      if (! $this->is_new_user()) {
        $_SESSION['ERROR'] = "User Exists";
        $_SESSION['ERROR_MESSAGE'] = "User [".$this->user_name."] or the email address [".$this->user_email."] already exists in the Application.";
        header("location: ../app-signup-failure.php");
        exit();
      }

      $this->create_user($this->user_name, $this->first_name, $this->last_name, $this->user_email, $this->user_password);

    }

    private function is_input_empty() {
      $empty_key;

      if (empty($this->first_name))
      {$empty_key = "first_name";}
      elseif(empty($this->last_name))
      {$empty_key = "last_name";}
      elseif(empty($this->user_name))
      {$empty_key = "user_email";}
      elseif(empty($this->user_password))
      {$empty_key = "user_name";}
      elseif(empty($this->user_email))
      {$empty_key = "user_password";}
      elseif(empty($this->user_repeat_password))
      {$empty_key = "user_repeat_password";}
      else
      {$empty_key = "none";}
        
        return $empty_key;
    }

    private function is_username_valid() {
      $result;

      if (preg_match("/^[a-zA-Z0-9_-]*$/", $this->user_name)) {
        $result = true;
      }
      else{
        $result = false;
      }

      return $result;
    }

    private function is_email_address_valid() {
      $result;

      if (filter_var($this->user_email, FILTER_VALIDATE_EMAIL))
      {
        $result = true;
      }
      else {
        $result = false;
      }

      return $result;
    }

    private function do_passwords_match()
    {
      $result;

      if ($this->user_password !== $this->user_repeat_password)
      { $result = false; }
      else
      { $result = true; }

      return $result;

    }

    private function is_new_user() {
      $result;

      $result = $this->check_user_in_database($this->user_name, $this->user_email);

      return $result;
    }
  }
?>