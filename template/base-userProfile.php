<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php echo $templateParams["titolo"]; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--style css-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-white">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h3>Socialtrack</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Home <span class="bi bi-fuel-pump"></span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="track.php">Track <span class="bi bi-map"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="myprofile.php">My Account <span
                                class="bi bi-person"></span></a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit"><span class="bi bi-search"></span></button>
                </form>
            </div>
        </div>
    </nav>



    <div class="container text-center border shadow mt-4 pt-4">
        <div class="container">
            <div class="profile">
                <div class="profile-header">
                    <div class="profile-header-cover"></div>
                    <div class="profile-header-content">
                        <div class="profile-header-img">
                            <img src="<?php echo $templateParams["imgProfile"]; ?>"
                                class="rounded-circle shadow-lg my-4" height="250" width="250" alt="image profile" />
                        </div>
                        <hr>
                        <div class="row">
                            <h4>
                                <?php echo $templateParams["username"] ?>
                            </h4>
                            <a href="mailto:<?php echo $templateParams["email"] ?>"
                                class="text-decoration-none text-dark">
                                <p>
                                    <?php echo $templateParams["email"] ?>
                                </p>
                            </a>
                            <a href="#" class="btn btn-primary">Follow</a>
                        </div>
                        <hr>
                        <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link " id="nav-home-tab" data-bs-toggle="tab" href="#nav-follower" role="tab"
                                aria-controls="nav-home" aria-selected="true">Followers</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-following"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Following</a>
                            <a class="nav-link " id="nav-disabled-tab" data-bs-toggle="tab" href="#nav-posts" role="tab"
                                aria-controls="nav-disabled" tabindex="-1" aria-disabled="true">Posts</a>
                            <a class="nav-link " id="nav-disabled-tab" data-bs-toggle="tab" href="#nav-tracks"
                                role="tab" aria-controls="nav-disabled" tabindex="-1" aria-disabled="true">Tracks</a>
                            <a class="nav-link " id="nav-disabled-tab" data-bs-toggle="tab" href="#nav-notifiche"
                                role="tab" aria-controls="nav-disabled" tabindex="-1" aria-disabled="true">Notifiche</a>
                        </nav>
                        <div class="tab-content pb-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-follower" role="tabpanel">
                                <?php require($templateParams["followers"]); ?>
                            </div>

                            <div class="tab-pane fade pb-3" id="nav-following" role="tabpanel">
                                <?php require($templateParams["following"]); ?>
                            </div>
                            <div class="tab-pane fade pb-3" id="nav-posts" role="tabpanel">
                                <?php require($templateParams["listaPost"]); ?>
                            </div>
                            <div class="tab-pane fade pb-3" id="nav-tracks" role="tabpanel">
                                <?php require($templateParams["listaTrack"]); ?>
                            </div>
                            <div class="tab-pane fade pb-3" id="nav-notifiche" role="tabpanel">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="mt-5 p-4 bg-dark text-white text-center pt-3">
        <a href="#" class="text-decoration-none link-light">
            <h3>SocialTrack</h3>
        </a>
        <p class="text-center text-muted">© 2023 Socialtrack by Leoni, Casamenti</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>