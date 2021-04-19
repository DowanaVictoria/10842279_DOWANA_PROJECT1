<?php
require_once "../phpFiles/connection.php";
session_start();

if(!isset($_SESSION["email"])) {
    header("location: ../index.html");
} else {
    $email = $_SESSION["email"];

    //Get user data
    $get_data = "SELECT * FROM users WHERE email = '$email'";
    $data_result =  $db->query($get_data);
    if($data_result->num_rows > 0) {
        while($userData = $data_result->fetch_assoc()) {
            $fname = $userData["fname"];
            $lname = $userData["lname"];
            $date = $userData["date_created"];
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="navbar">
        <h2>Hi, user</h4>
        <a href="../phpFiles/logOut.php">Log Out</a>
    </div>

    <div class="main">
        <div class="user">
            <div class="first">
                <img src="../images/avatar.svg" alt="">
            </div>
            <div class="second">
                <p>First Name: <?php echo $fname ?> </p>
                <p>Last Name: <?php echo $lname ?></p>
                <p>Email: <?php echo $email ?></p>
                <p>Date created: <?php echo $date ?> </p>
            </div>
        </div>
    </div>
</body>
</html>