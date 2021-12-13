<?php
session_start();
if (!empty($_SESSION)) header("Location: Modules/Timeline.php");
//Kick the user out if the timeout says it.
require_once "../Helpers/timeout.php";
//Class
require_once "../Class/Usuario.php";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";
$description = $_POST["description"] ?? "";
$avatar = $_POST["avatar"] ?? "";
$email = $_POST["email"] ?? "";
$firstName = $_POST["first_name"] ?? "";
$secondName = $_POST["second_name"] ?? "";

if ($username != "" && $password != "") {
  Usuario::addNewUser($username, $password, $description, $avatar, $firstName, $secondName, $email);
  header('Location: ../index.php');
  die();
}

//Register user
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/register.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>

<body>
  <div class="container d-flex justify-content-center">
    <div class="row w-75 justify-content-center ">
      <div class="col-8 border rounded p-5 shadow bg-white">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
          </div>
          <div class="panel-body">
            <form action="Register.php" method="post" role="form">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="first_name" id="first_name" class="form-control input-sm floatlabel" placeholder="First Name" required>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" name="avatar" id="avatar" class="form-control input-sm" placeholder="Insert a link to an image here">
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" required>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
              </div>
              <div class="form-group">
                <textarea name="description" id="description" rows="3" class="form-control" placeholder=" Write your bio here!"></textarea>
              </div>

              <input type="submit" value="Register" class="btn btn-block">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>





<!-- <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

<!-- Icon -->
<!-- <div class="fadeIn first">
  <img src="./img/logo.png" id="icon" alt="User Icon" />
</div> -->

<!-- Login Form -->
<!-- <div class="container">
  <form action="register.php" method="post">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" class="form-control" name="username" placeholder="login">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" class="form-control" name="password" placeholder="password">
        </div>
      </div>
    </div>
</div>
<input type="submit" class="fadeIn fourth" value="Register">
</form>
<?php echo isset($loginIncorrecto) ? "<p class=\"alert alert-danger\">Incorrect username or password.</p>" : "" ?> -->

<!-- Remind Passowrd -->
<!-- <div id="formFooter">
</div>
</div>
</div>
</div> -->