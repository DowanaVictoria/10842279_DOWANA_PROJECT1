<?php
require_once "connection.php";
session_start();

//Sign Up
if(isset($_POST["fname"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $date_created = date("d/m/Y");

    //check if inputs are not empty
    if($fname != null && $lname != null && $email !=null && $password1 != null && $password2 != null) {

    //Check if user already exists in the database
    $check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $check_result = $db->query($check_query);
    if($check_result->num_rows > 0) {
        echo "User already exist";
    } else {
        //Check passwords
        if($password1 == $password2) {
            $password = md5($password1);
            //register user
            $register = "INSERT INTO users(fname, lname, email, password, date_created) VALUES ('$fname', '$lname', '$email', '$password', '$date_created')";
            if($db->query($register)) {
                echo "user registered successfully";
                $_SESSION["email"] = $email;
            } else {
                echo "error: ".$db->error;
            }
        } else {
            echo "Passwords do not match";
        }
    }
} else {
    echo "Please typein all fields";
} 
}

//Sign In
if(isset($_POST["s-email"]) && isset($_POST["s-pass"])) {
    $email = $_POST["s-email"];
    $pass = md5($_POST["s-pass"]);

    //check if user is in the database
    $check_login = "SELECT * FROM users WHERE email ='$email' AND password = '$pass'";
    $login_result = $db->query($check_login);
    if($login_result->num_rows > 0) {
        $_SESSION["email"] = $email;
        echo "user logged in";
    }else {
        echo "Incorrect email/password";
    }
}


?>