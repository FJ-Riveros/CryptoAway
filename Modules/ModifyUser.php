<?php
session_start();
if (empty($_SESSION)) header("Location: ../index.php");
//Kick the user out if the timeout says it.
require_once "../Helpers/timeout.php";
require_once "../Class/Usuario.php";
//Data del usuario activo
$userData = Usuario::getUser($_SESSION["userId"]);
$actualUser = $userData->idUser;

//Modificamos un usuario
if (!empty($_POST)) {
  $userData->username = $_POST["userName"];
  $userData->surname = $_POST["surname"];
  $userData->name = $_POST["name"];
  $userData->avatar = $_POST["avatar"];
  $userData->email = $_POST["email"];
  $userData->metamaskAddress = $_POST["metamaskAddress"];
  $userData->description = $_POST["description"];
  $userData->updateUser();
  header('Location: Timeline.php', true, 303);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="stylesheet" type="text/css" href="../css/PostStyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <?php require_once "../Helpers/Nav.php" ?>
  <div class="container">
    <!-- /.profile-section-user -->
    <div class="profile-section-main">
      <!-- /.nav-tabs -->
      <!-- Tab panes -->
      <div class="tab-content profile-tabs-content">
        <div class="tab-pane active" id="profile-overview" role="tabpanel">
          <form action="ModifyUser.php" method="post">
            <div class="post-editor">
              <h4>Modify your data!</h4>
              <label for="userName">Profile Picture</label>
              <input type="text" name="avatar" id="avatar" class="form-control" value="<?= $userData->avatar ?>" required></input>
              <label for="userName">Username</label>
              <input type="text" name="userName" id="userName" class="form-control" value="<?= $userData->username ?>" required></input>
              <label for="surname">Surname</label>
              <input type="text" name="surname" id="surname" class="form-control" value="<?= $userData->surname ?>" required></input>
              <label for="name">Name </label>
              <input type="text" name="name" id="name" class="form-control" value="<?= $userData->name ?>" required></input>
              <label for="name">Email </label>
              <input type="text" name="email" id="email" class="form-control" value="<?= $userData->email ?>" required></input>
              <label for="metamaskAddress"> Metamask Address </label>
              <input type="text" name="metamaskAddress" id="metamaskAddress" class="form-control" value="<?= $userData->metamaskAddress ?>" required></input>
              <label for="description">Description</label>
              <textarea name="description" id="description" class="post-field mt-2" required><?= $userData->description ?></textarea>
              <div class="d-flex">
                <button class="btn btn-success px-4 py-1">Modify</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.profile-section-main -->
  </div>
  </div>

  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="../JS/Post.js"></script>
</body>

</html>