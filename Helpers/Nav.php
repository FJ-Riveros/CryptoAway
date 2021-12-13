<?php
//Data del usuario activo
$userData = Usuario::getUser($_SESSION["userId"]);

?>

<div class="container">
  <div class="profile-page tx-13">
    <div class="row">
      <div class="col-12 grid-margin header-margin">
        <div class="profile-header">
          <div class="cover">
            <div class="cover-body d-flex justify-content-between align-items-center">
              <div>
                <img class="profile-pic" src="<?= $userData->avatar ?>" alt="profile">
                <span class="profile-name"> <?= $userData->username ?> </span>
              </div>
            </div>
          </div>
          <div class="header-links">
            <ul class="links d-flex align-items-center mt-3 mt-md-0">
              <li class="header-link-item d-flex align-items-center">
                <a class="pt-1px  d-md-block" href="../Modules/Timeline.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns mr-1 icon-md">
                    <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18">
                    </path>
                  </svg>
                  <span class="d-none d-md-inline">Timeline</span> </a>
              </li>
              <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                <a class="pt-1px  d-md-block" href="../Modules/Trips.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-1 icon-md">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                  <a class="pt-1px  d-md-block" href="../Modules/Trips.php"><span class="d-none d-md-inline">Trips</span> </a>
              </li>
              <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                <a class="pt-1px  d-md-block" href="../Modules/Friends.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mr-1 icon-md">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <span class="d-none d-md-inline">Friends</span><span class="text-muted tx-12 d-none d-md-inline"><?= count(Usuario::getUserFriends($userData->idUser)) ?></span></a>
              </li>
              <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                <a class="pt-1px  d-md-block" href="../Modules/PostSection.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image mr-1 icon-md">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                  </svg>
                  <span class="d-none d-md-inline"> My Posts</span></a>
              </li>
              <a href="../Modules/Timeline.php?closeSession=true" class="pt-1px  d-md-block ml-1">
                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                  <i class="fas fa-sign-out-alt"></i>
                  <span class="d-none d-md-inline">Logout</span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>