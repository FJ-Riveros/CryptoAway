<?php
session_start();
if (empty($_SESSION)) header("Location: ../index.php");
//Kick the user out if the timeout says it.
require_once "../Helpers/timeout.php";
//Class
require_once "../Class/Usuario.php";
require_once "../Class/Post.php";
//
$likePost = $_GET["likePost"] ?? "";
//Data del usuario activo
$userData = Usuario::getUser($_SESSION["userId"]);
$actualUser = $userData->idUser;

//Obtenemos los datos en el caso de que queramos borrar un Post
$idPostToDelete = $_POST["idPost"] ?? "";
$postAction = $_POST["postAction"] ?? "";
if ($idPostToDelete != "" && $postAction != "") {
  $deletePost = Post::deletePost($idPostToDelete);
  header('Location: PostSection.php', true, 303);
  die();
}
//Damos like o lo quitamos
if ($likePost != "") {
  if (Usuario::userLikedActualPost($actualUser, $likePost)) {
    Usuario::removeLike($actualUser, $likePost);
  } else {
    Usuario::giveLike($actualUser, $likePost);
  }
}

//Obtenemos los datos del form si es enviado para crear un Post
$postImage = $_POST["postImage"] ?? "";
$postText = $_POST["postText"]  ?? "";
if ($postText != "") {
  $addPost = Post::addPost($actualUser, $postImage, $postText);
  header('Location: PostSection.php', true, 303);
  die();
}

$userPosts = Post::getPosts($actualUser);



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
          <form action="PostSection.php" method="post">
            <div class="post-editor">
              <h4>Create a Post!</h4>
              <input type="text" name="postImage" id="postImage" class="form-control" placeholder="Insert an image if you want!"></input>
              <textarea name="postText" id="post-field" class="post-field mt-2" placeholder="Write Something Cool!" required></textarea>
              <div class="d-flex">
                <button class="btn btn-success px-4 py-1">Post</button>
              </div>
            </div>
          </form>

          <?php foreach ($userPosts as $item) { ?>
            <div class="col-md-12 grid-margin">
              <div class="card rounded">
                <div class="card-header">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <img class="img-xs rounded-circle" src="<?= $userData->avatar ?>" alt="">
                      <div class="ml-2">
                        <p><?= $userData->username ?></p>
                        <p class="tx-11 text-muted">1 min ago</p>
                      </div>
                    </div>
                    <div class="dropleft">
                      <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <div class=" dropdown-item d-flex align-items-center deletePost" id="<?= $item->getIdPost() ?>">
                          <i class="far fa-trash-alt mr-1"></i><span>Delete</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p class="mb-3 tx-14"><?= $item->getTextPost() ?></p>
                  <img class="img-fluid" src="<?= $item->getImgPost() ?>" alt="">
                </div>
                <div class="card-footer">
                  <div class="d-flex post-actions">
                    <a href="PostSection.php?likePost=<?= $item->getIdPost() ?>" class="d-flex align-items-center text-muted mr-4">
                      <?php if (Usuario::userLikedActualPost($actualUser, $item->getIdPost())) {
                        echo "<i style=\"color: red\" class=\"fas fa-heart\"></i>";
                      } else {
                        echo "<i class=\"far fa-heart\"></i>";
                      } ?>
                      <span class="d-none d-md-block ml-2"><?= Post::getLikes($item->getIdPost()) ?> Likes </span>
                    </a>
                    <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                      <i class="far fa-comment-alt"></i>
                      <span class="d-none d-md-block ml-2">Comment</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
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