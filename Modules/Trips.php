<?php
session_start();
if (empty($_SESSION)) header("Location: ../index.php");
//Kick the user out if the timeout says it.
require_once "../Helpers/timeout.php";
//Class
require_once "../Class/Database.php";
require_once "../Class/Usuario.php";
require_once "../Class/TripsClass.php";

//Data del usuario activo
$userData = Usuario::getUser($_SESSION["userId"]);
$actualUser = $userData->idUser;

//Trigger cuando un usuario quiere borrar un viaje de sus comprados.
$idUserTripDelete = $_GET["idTripUserDelete"] ?? "";
if ($idUserTripDelete != "") {
  Trip::deleteUserInTrip($actualUser, $idUserTripDelete);
  header('Location: Trips.php', true, 303);
}

//Compra de un viaje
$idTripBuy = $_POST["idTripBuy"] ?? "";
if ($idTripBuy != "") {
  $addUserToTrip = Trip::addUserToTrip($actualUser, $idTripBuy);
}

//Devolvemos todos los viajes
$trips  = Trip::retrieveAllTrips();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php require_once "../Helpers/Nav.php" ?>
  <div class="row profile-body">
    <!-- middle wrapper start -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
      <?php if (Trip::isUserInAnyTrip($actualUser)) echo "<h3>My trips</h3>"  ?>
      <div class="row">
        <?php foreach ($trips as $singleTrip) {
          if (Trip::isUserInTrip($actualUser, $singleTrip->idTrip)) { ?>
            <div class="col-md-4 fixed-height">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top poster" src="<?= $singleTrip->img ?>" alt="Card image cap">
                <a href="Trips.php?idTripUserDelete=<?= $singleTrip->idTrip ?>"><i class=" fas fa-times deleteIcon text-white"></i></a>
                <div class="card-header align-center">
                  <h5><?= $singleTrip->destination ?></h5>
                </div>
                <div class="card-body">
                  <p class="card-text text-size-fixed">
                    <?= $singleTrip->itinerary ?>
                  </p>
                  <i class="fas fa-coins"></i>
                  <span><?= $singleTrip->price ?>$</span></br>
                  <i class="fas fa-users"></i>
                  <span><?php echo Trip::retrieveUsersInTrip($singleTrip->idTrip) ?>/<?= $singleTrip->maxGroup ?></span></br>
                  <i class="fas fa-plane-departure"></i>
                  <span><?= $singleTrip->fechaInicio ?></span></br>
                  <i class="fas fa-plane-arrival"></i>
                  <span><?= $singleTrip->fechaFin ?></span>
                  <div class="d-flex justify-content-between align-items-center mt-1">
                    <div class="btn-group">
                      <button type="button" id="<?= $singleTrip->idTrip ?>" class="btn btn-sm btn-outline-secondary buyButton" <?php echo Trip::retrieveUsersInTrip($singleTrip->idTrip) >= $singleTrip->maxGroup || Trip::isUserInTrip($actualUser, $singleTrip->idTrip) ? "disabled" : "" ?>>Buy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } ?>
        <!-- middle wrapper end -->
      </div>
    </div>

    <div class="col-md-12 col-xl-12 middle-wrapper">
      <?= "<h3>Available trips</h3>"  ?>
      <div class="row">
        <?php foreach ($trips as $singleTrip) { ?>
          <div class="col-md-4 fixed-height">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top poster" src="<?= $singleTrip->img ?>" alt="Card image cap">
              <div class="card-header align-center">
                <h5><?= $singleTrip->destination ?></h5>
              </div>
              <div class="card-body">
                <p class="card-text text-size-fixed">
                  <?= $singleTrip->itinerary ?>
                </p>
                <i class="fas fa-coins"></i>
                <span><?= $singleTrip->price ?>$</span></br>
                <i class="fas fa-users"></i>
                <span><?php echo Trip::retrieveUsersInTrip($singleTrip->idTrip) ?>/<?= $singleTrip->maxGroup ?></span></br>
                <i class="fas fa-plane-departure"></i>
                <span><?= $singleTrip->fechaInicio ?></span></br>
                <i class="fas fa-plane-arrival"></i>
                <span><?= $singleTrip->fechaFin ?></span>
                <div class="d-flex justify-content-between align-items-center mt-1">
                  <div class="btn-group">
                    <button type="button" id="<?= $singleTrip->idTrip ?>" class="btn btn-sm btn-outline-secondary buyButton" <?php echo Trip::retrieveUsersInTrip($singleTrip->idTrip) >= $singleTrip->maxGroup || Trip::isUserInTrip($actualUser, $singleTrip->idTrip) ? "disabled" : "" ?>>Buy</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        } ?>
        <!-- middle wrapper end -->
      </div>
    </div>
  </div>

  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="../JS/Trips.js"></script>
</body>

</html>