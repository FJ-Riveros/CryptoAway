<?php

require_once "../Class/Session.php";
session_start();
if (!empty($_SESSION)) header("Location: ./Timeline.php");
$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

//Login check
if ($username != "" && $password != "") {
    $session = Session::createSession();
    if (!$session->tryToLogin($username, $password)) $loginIncorrecto = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Englebert&display=swap" rel="stylesheet">

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img src="./img/logo.png" id="icon" alt="User Icon" /> -->
                <p class="mt-3"><span class="titulo naranja">Crypto</span><span class="titulo">Away.</span></p>
            </div>

            <!-- Login Form -->
            <form action="Login.php" method="post">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
            <?php echo isset($loginIncorrecto) ? "<p class=\"alert alert-danger\">Incorrect username or password.</p>" : "" ?>
            <a href="./Modules/Register.php">Register</a>
            <!-- Remind Passowrd -->
            <div id="formFooter">
            </div>

        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>