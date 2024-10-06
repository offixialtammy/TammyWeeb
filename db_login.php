<?php
require "formlogin.php";

if(isset($_REQUEST["firstname"])){
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwd1 = $_POST["pwd1"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    if (empty($firstname) || empty($surname) || empty($email) || empty($pwd) || empty($pwd1) || $gender =="Select Gender" || $country =="Select Country") {
        header("location: ../login_one.php?firstname=$firstname&surname=$surname&email=$email&pwd=$pwd&pwd1=$pwd1&gender=$gender&country=$country&empty=All fields are not filled");
        exit();
    }else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../login_one.php?email=$email&firstnme=$firstname&lastname=$lastname&email_err=You typed an invalid email address");
            exit();
        }
    }
    if ($pwd == $pwd1) {
        $date = date ("y:d:m h:i:sa");
        $otp = rand(2000, 9999);
        $user_id = strtotime("0 minute");
        $pwdh = password_hash($pwd, PASSWORD_DEFAULT);
        $select = "SELECT  * from prime where email = '$email' ";
        $query = mysqli_query( $formlogin, $select);
        $insert = "insert into prime(firstname, surname, email, pwd, gender, country, created_at, otp) values('$firstname', '$surname','$email','$pwdh','$gender','$country','$date','$otp' )";
        mysqli_query( $formlogin, $insert);
        if (mysqli_num_rows($query) > 0) {
            header("location: ../login_one.php?email=$email&firstnme=$firstname&lastname=$lastname&email_err=Email address is Already used");
        }
    }else{
        header("location: ../login_one.php?email=$email&firstnme=$firstname&lastname=$lastname&pwd_err=Password do not match");
    }

}
    
?>