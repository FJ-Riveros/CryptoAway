
<!DOCTYPE html <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>

<div class="container mt-4">
    <div class="row">
        <!-- Left Side -->
        <div class="col-3">

            <!-- Profile card -->
            <div class="profile__card">
                <div class="profile__card__img" style="background-image: url('img/person_1.jpg')"></div>
                <div class="ml-2 mb-0 text text-left">
                    <h5>FJ</h5>
                    <p>@FJ-Riveros</p>
                </div>
            </div>

            <!-- Routes -->
            <div class="routes">
                <div class="children__routes active">
                    <div class="home d-flex align-items-center">
                        <i class="bi bi-house-fill"></i>
                        <a href="" class="ml-2">Home</a>
                    </div>
                </div>
                
                <div class="children__routes">
                    <div class="friends d-flex align-items-center">
                        <i class="bi bi-people-fill"></i>
                        <a href="" class="ml-2">Friends</a>
                    </div>
                </div>

                <div class="children__routes">
                    <div class="posts d-flex align-items-center">
                        <i class="bi bi-collection-fill"></i>
                        <a href="" class="ml-2">Your Posts</a>
                    </div>
                </div>

            </div>

        </div>

        <!-- Center -->
        <div class="col-6">
            <div class="feed__card__post">
                <div class="feed__card__post__header">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start align-items-center">
                            <img src="img/destination-3.jpg" alt="" class="header__img">
                            <div class="header__text ml-2">
                                <h4>Ruiz</h4>
                                <p>3 hours ago</p>
                            </div>
                        </div>

                        <div class="col-6">
                            
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="body__img" style="background-image: url('img/destination-3.jpg')">

                    </div>
                    <p class="body__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugit dignissimos obcaecati, nam suscipit, voluptas animi praesentium harum illo laborum minima iusto doloribus ratione commodi cum? Doloribus iste facilis delectus.
                    Consequatur odio dicta blanditiis.</p>

                </div>

                <div class="footer">
                    <i class="bi bi-suit-heart"></i>
                    <i class="bi bi-chat-left-text ml-4"></i>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-3">
            <div class="latest__photos__container">
                <h3>Latest Photos</h3>
                <hr/>
                <div class="photos__grid row">
                    <div class="col-4" style="background-image: url('img/destination-4.jpg')"></div>
                    <div class="col-4" style="background-image: url('img/destination-5.jpg')"></div>
                    <div class="col-4" style="background-image: url('img/destination-6.jpg')"></div>
                </div>
            </div>

            <div class="friend__suggestion__container">
                <h3>Add Friends!</h3>
                <hr/>
                <div class="row">
                    <div class="col-6">
                        <img src="img/destination-4.jpg" alt="" width="20px" height="20px">
                        <span>hola</span>
                    </div>
                    <div class="col-6"><button class="btn btn-primary"><a href="">Add</a></button></div>
                </div>
            </div>
        </div>

    </div>
</div>











    <div class="container"> 
       <div class="profile-page tx-13">
            

            <main class="py-4">
                @yield('header')
            </main>

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
                            <p><?= "hola"//$userData->description ?></p>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0 ">Surname</h6>
                                <p class="text-muted"><?= "hola"//$userData->surname ?></p>
                            </div>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0 ">Name</h6>
                                <p class="text-muted"><?= "hola"//$userData->name ?></p>
                            </div>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0 ">Email</h6>
                                <p class="text-muted"><?= "hola"//$userData->email ?></p>
                            </div>
                            <div class="mt-3">
                                <h6 class="tx-11 font-weight-bold mb-0">Metamask Address</h6>
                                <p class="text-muted"><?= "hola"//$userData->metamaskAddress ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
                    <div class="row">
                         <?php /*foreach ($userFriendsData as $friend) {
                            if ($lastPost = Post::getLastPost($friend->idUser)) {
                                $postUser = Usuario::getUser($lastPost->getPostOwner());
                                */
                        ?> 
                                <div class="col-md-12 grid-margin">
                                    <div class="card rounded">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img class="img-xs rounded-circle" src="<?= "hola"//$postUser->avatar ?>" alt="">
                                                    <div class="ml-2">
                                                        <p><?= "hola"//$postUser->surname . " " . $postUser->name ?></p>
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
                                            <p class="mb-3 tx-14"><?= "hola"//$lastPost->getTextPost() ?></p>
                                            <img class="img-fluid" src="<?= "hola" //$lastPost->getImgPost() ?>" alt="">
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex post-actions">
                                                <a href="Timeline.php?likePost=<?= "hola"//$lastPost->getIdPost() ?>" class="d-flex align-items-center text-muted mr-4">
                                                    <?php /*if (Usuario::userLikedActualPost($actualUser, $lastPost->getIdPost())) {
                                                        echo "<i style=\"color: red\" class=\"fas fa-heart\"></i>";
                                                    } else {
                                                        echo "<i class=\"far fa-heart\"></i>";
                                                    } */?>
                                                    <span class="d-none d-md-block ml-2"><?= "hola"//Post::getLikes($lastPost->getIdPost()) ?> Likes </span>
                                                </a>
                                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                    <i class="far fa-comment-alt"></i>
                                                    <span class="d-none d-md-block ml-2">Comments</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php //}
                       // } ?>
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
                                            <?php /*foreach (Post::getPosts($actualUser) as $post) {
                                                if ($post->getImgPost() != "") { */?>
                                                    <div class="col-md-6">
                                                        <figure>
                                                            <img class="img-fluid" src="<?= "hola"//$post->getImgPost() ?>" alt="">
                                                        </figure>
                                                    </div>
                                            <?php /*}
                                            }*/ ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">suggestions for you</h6>
                                    <?php //foreach (Usuario::suggestUsersToAdd($actualUser) as $user) { ?>
                                        <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                            <div class="d-flex align-items-center hover-pointer">
                                                <img class="img-xs rounded-circle" src="<?= "hola" //$user->avatar ?>" alt="">
                                                <div class=" ml-2">
                                                    <p class="mb-0"><?= "hola" //$user->surname ?></p>
                                                    <p class="mb-0 tx-11 text-muted"><?= "hola"//$user->username ?></p>
                                                </div>
                                            </div>
                                            <a href="Timeline.php?addUser=<?= "hola" //$user->username ?>" class="btn btn-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="8.5" cy="7" r="4"></circle>
                                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                                </svg>
                                            </a>
                                        </div>

                                    <?php // } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right wrapper end -->
            </div>
        </div>
    </div>
    <div id="example"></div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

