<?php
require "log.php";

if(isset($_REQUEST["email"])) {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    if(empty($email) || empty($pwd)) {
        header("location: login.php?email=$email&pwd=$pwd&err_msg=Incorrect email or password");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: login.php?email=$email&pwd=$pwd&err_msg=Invalid email address");
        exit();
    }if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $select = "SELECT * FROM prime WHERE email='$email' ";
        $query = mysqli_query($log, $select);
        $count_rows = mysqli_num_rows($query);
        if ($count_rows < 1) {
            header("location: login.php?email=$email&pwd=$pwd&err_msg=email address not found");
        }else {
            $row = mysqli_fetch_array($query);
            $verify_pwd = password_verify($pwd, $row["pwd"]);
            if ($verify_pwd == true) {
                
            }

        }
    }
}
?>