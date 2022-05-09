<?php
session_start();

//Kick the user out if the timeout says it.
require_once "../Helpers/timeout.php";
$closeSession = $_GET["closeSession"] ?? "";
$likePost = $_GET["likePost"] ?? "";

//Check if the user wants to logout.
if ($closeSession != "") {
    $_SESSION = [];
    session_destroy();
}
//Redirect if the user is not logged in
if (empty($_SESSION)) header("Location: ../index.php");

require_once "../Class/Usuario.php";
require_once "../Class/Post.php";



//Data of the user
$userData = Usuario::getUser($_SESSION["userId"]);

//Actual user
$actualUser = $userData->idUser;

//Checks if the user added a friend
$addUser = $_GET["addUser"] ?? "";
if ($addUser != "") {
    Usuario::tryToAddFriend($addUser, $userData->username);
    header('Location: Timeline.php', true, 303);
}
//Checks the like, if the user already liked that post it removes it, otherwise it adds the like.
if ($likePost != "") {
    if (Usuario::userLikedActualPost($actualUser, $likePost)) {
        Usuario::removeLike($actualUser, $likePost);
    } else {
        Usuario::giveLike($actualUser, $likePost);
    }
}

//Retrieve the data from the friends of a user
$userFriendsData = Usuario::getUserFriends($userData->idUser);
//Get last post of the given user.
Post::getLastPost($userData->idUser);

?>
<!DOCTYPE html <html lang="en">

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

    <div class="container">
        <div class="profile-page tx-13">
            <?php require_once "../Helpers/Nav.php" ?>
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="card-title mb-0">About</h6>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="ModifyUser.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg> <span class="">Edit</span></a>
                                    </div>
                                </div>
                            </div>
                            <p><?= $userData->description ?></p>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0 ">Surname</h6>
                                <p class="text-muted"><?= $userData->surname ?></p>
                            </div>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0 ">Name</h6>
                                <p class="text-muted"><?= $userData->name ?></p>
                            </div>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0 ">Email</h6>
                                <p class="text-muted"><?= $userData->email ?></p>
                            </div>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0">Metamask Address</h6>
                                <p class="text-muted"><?= $userData->metamaskAddress ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
                    <div class="row">
                        <?php foreach ($userFriendsData as $friend) {
                            if ($lastPost = Post::getLastPost($friend->idUser)) {
                                $postUser = Usuario::getUser($lastPost->getPostOwner());
                        ?>
                                <div class="col-md-12 grid-margin">
                                    <div class="card rounded">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img class="img-xs rounded-circle" src="<?= $postUser->avatar ?>" alt="">
                                                    <div class="ml-2">
                                                        <p><?= $postUser->surname . " " . $postUser->name ?></p>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg pb-3px">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-meh icon-sm mr-2">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="8" y1="15" x2="16" y2="15"></line>
                                                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                            </svg> <span class="">Unfollow</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-3 tx-14"><?= $lastPost->getTextPost() ?></p>
                                            <img class="img-fluid" src="<?= $lastPost->getImgPost() ?>" alt="">
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex post-actions">
                                                <a href="Timeline.php?likePost=<?= $lastPost->getIdPost() ?>" class="d-flex align-items-center text-muted mr-4">
                                                    <?php if (Usuario::userLikedActualPost($actualUser, $lastPost->getIdPost())) {
                                                        echo "<i style=\"color: red\" class=\"fas fa-heart\"></i>";
                                                    } else {
                                                        echo "<i class=\"far fa-heart\"></i>";
                                                    } ?>
                                                    <span class="d-none d-md-block ml-2"><?= Post::getLikes($lastPost->getIdPost()) ?> Likes </span>
                                                </a>
                                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                    <i class="far fa-comment-alt"></i>
                                                    <span class="d-none d-md-block ml-2">Comments</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
                <!-- middle wrapper end -->
                <!-- right wrapper start -->
                <div class="d-none d-xl-block col-xl-3 right-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">latest photos</h6>
                                    <div class="latest-photos">
                                        <div class="row">
                                            <?php foreach (Post::getPosts($actualUser) as $post) {
                                                if ($post->getImgPost() != "") { ?>
                                                    <div class="col-md-6">
                                                        <figure>
                                                            <img class="img-fluid" src="<?= $post->getImgPost() ?>" alt="">
                                                        </figure>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">suggestions for you</h6>
                                    <?php foreach (Usuario::suggestUsersToAdd($actualUser) as $user) { ?>
                                        <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                            <div class="d-flex align-items-center hover-pointer">
                                                <img class="img-xs rounded-circle" src="<?= $user->avatar ?>" alt="">
                                                <div class=" ml-2">
                                                    <p class="mb-0"><?= $user->surname ?></p>
                                                    <p class="mb-0 tx-11 text-muted"><?= $user->username ?></p>
                                                </div>
                                            </div>
                                            <a href="Timeline.php?addUser=<?= $user->username ?>" class="btn btn-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="8.5" cy="7" r="4"></circle>
                                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                                </svg>
                                            </a>
                                        </div>

                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div id="app"></div>
                        
                    </div>
                </div>
                <!-- right wrapper end -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../dist/bundle.js"></script>
</body>

</html>