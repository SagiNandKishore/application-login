<?php
include_once 'dtb.inc.php';

$first_name = mysqli_real_escape_string($conn, $_POST['u_firstname']);
$last_name = mysqli_real_escape_string($conn, $_POST['u_lastname']);
$email = mysqli_real_escape_string($conn, $_POST['u_email']);
$uid = mysqli_real_escape_string($conn, $_POST['u_username']);
$pwd = mysqli_real_escape_string($conn, $_POST['u_password']);



if (empty($uid) || empty($pwd)) {
    header("Location: ../app-signup.html?error=emptyinput");
    exit();
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../app-signup.html?error=invalidemail");
        exit();
    } else {
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) 
    VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Error";
        } else {
            $password_hash = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $password_hash );
            mysqli_stmt_execute($stmt);
            header("Location: ../app-signup.html?signup=success");
            exit();
        }
    }
}
