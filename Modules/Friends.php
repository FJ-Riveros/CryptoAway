<?php
session_start();
if (empty($_SESSION)) header("Location: ../index.php");
//Kick the user out if the timeout says it.
require_once "../Helpers/timeout.php";
require_once "../Class/Database.php";
require_once "../Class/Usuario.php";

//Instancia BDD
$connection = Database::createInstance();

//Data del usuario activo
$userData = Usuario::getUser($_SESSION["userId"]);
$usernameAdd = $_POST["friendToAdd"] ?? "";
$actualUserId = $userData->idUser;
$response = $_GET["response"] ?? "";
if ($response != "") $response = "A friend request has been send to the user.";

//Variables
$color = $_GET["color"] ?? "";
$deleteFriend = $_GET["deleteFriend"] ?? "";
if ($deleteFriend != "") {
    Usuario::deleteFriend($actualUserId, $deleteFriend);
}
//Peticiones de amistad
//Data del usuario que quiera aceptar o cancelar una petición
$friendAction = $_POST["friendAction"] ?? "";
$friendIdAction = $_POST["friendIdAction"] ?? "";
echo $friendAction;
if ($friendAction != "") {
    if ($friendAction == "Add") {
        $connection->createQuery("UPDATE friends 
        SET friendRequest = 0 
        WHERE users_IdUser = $friendIdAction AND users_IdUser1 = $actualUserId ;");
        die();
    } else {
        $connection->createQuery(
            "DELETE FROM friends WHERE users_IdUser = $friendIdAction AND users_IdUser1 = $actualUserId;"
        );
        die();
    }
}

// //Obtenemos los amigos de un usuario
$userFriends = Usuario::getUserFriends($actualUserId);
//Obtenemos las peticiones de amistad de un usuario
$userFriendRequests = Usuario::getUserFriendRequests($actualUserId);

//Intentamos agregar un usuario
if ($usernameAdd != "") {
    if (Usuario::tryToAddFriend($usernameAdd, $userData->username)) {
        $response = "A friend request has been send to the user.";
        header('Location: Friends.php?color=success&response=1', true, 303);
        die();
    } else {
        $color = "danger";
        $response = "The user was not found.";
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
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php require_once "../Helpers/Nav.php"; ?>

    <div class="row">
        <div class="col col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="Friends.php" method="post">
                        <div class="addFriend">
                            <label for="friendToAdd">Add friend</label>
                            <input class="form-control" type="text" id="friendToAdd" name="friendToAdd" placeholder="Enter the username to add a friend!"></input>
                            <button class="btn btn-success mt-2">Add</button>
                            <?php echo isset($response) ? "<div class=\"alert alert-$color mt-2\">$response<div>" : ""; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php if ($userFriends) echo "<h3 class=\"mt-3\">Friends</h3>" ?>
    <div class="row">
        <?php foreach ($userFriends as $friend) { ?>
            <div class="col-md-6 col-xl-4 mt-4">
                <div class="card">
                    <a href="Friends.php?deleteFriend=<?= $friend->idUser ?>"><i class="fas fa-times deleteIcon"></i></a>
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span style="background-image: url('<?= $friend->avatar ?>')" class="avatar avatar-xl mr-3"></span>
                            <div class="media-body overflow-hidden">
                                <h5 class="card-text mb-0"><?= $friend->username ?></h5>
                                <p class="card-text  text-muted"><?= $friend->surname . " " . $friend->name ?></p>
                                <p class="card-text">
                                    <?= $friend->email ?>
                                </p>
                                <p class="card-text">
                                    <?= $friend->metamaskAddress ?>
                                </p>
                            </div>
                        </div><a href="#" class="tile-link"></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php if ($userFriendRequests) echo "<h3 class=\"mt-2\">Friend Requests</h3>" ?>
    <?php foreach ($userFriendRequests as $friendRequests) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="people-nearby">
                        <div class="nearby-user">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <img src="<?= $friendRequests->avatar ?>" alt="user" class="profile-photo-lg">
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <h5><?= $friendRequests->username ?></h5>
                                    <p><?= $friendRequests->description ?></p>
                                </div>
                                <div class="col-md-5 col-sm-5 d-flex align-items-center">
                                    <button id="<?= $friendRequests->idUser ?> Add" class="btn btn-success pull-right align-middle">Add Friend</button>
                                    <button id="<?= $friendRequests->idUser ?> Delete" class="btn btn-secondary pull-right align-middle ml-1">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../JS/Friends.js"></script>
</body>

</html>