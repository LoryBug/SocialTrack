<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php echo $templateParams["titolo"]; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

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

    <!--Filter Button-->
    <!--visible solo quando sm-->
    <div class="row d-block d-sm-none">
        <p>
            <button class="btn btn-danger rounded-circle border shadow m-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#FilterButton" aria-expanded="false" aria-controls="FilterButton">
                <img src="upload/Filter_icon.png" width="25" height="30" alt="button filter">
            </button>
        </p>
        <div class="collapse" id="FilterButton">
            <div class="card card-body">
                <!--form small display-->
                <form>
                    <p class="fs-5 fw-bold">Filter</p>
                    <div class="form-floating my-2">
                        <select class="form-select" id="Type" aria-label="Floating label select example">
                            <option selected>Road</option>
                            <option value="1">Off-Road</option>
                            <option value="2">Dual</option>
                        </select>
                        <label for="Type">Select track's tipology</label>
                    </div>
                    <div class="form-floating my-2">
                        <select class="form-select" id="Region" aria-label="Floating label select example">
                            <option selected>Nord</option>
                            <option value="1">Centro</option>
                            <option value="2">Sud</option>
                        </select>
                        <label for="Region">Select Region</label>
                    </div>
                    <div class="form-floating my-2">
                        <select class="form-select" id="kmFilter" aria-label="Floating label select example">
                            <option selected>0km - 50km</option>
                            <option value="1">50km - 100km</option>
                            <option value="2">100km - 150km</option>
                        </select>
                        <label for="kmFilter">Select km range</label>
                    </div>
                    <button type="submit" class="btn btn-danger my-2"><span class="bi bi-filter"></span></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <!--colonna a sinistra-->
            <!--hidden solo quando on sm display-->
            <div
                class="col-sm-3 border-end shadow rounded-2 bg-white mt-3 p-3 d-none d-sm-block d-flex align-self-start">
                <!--my avatar-->
                <div class="rounded-3 bg-white m-2 p-3">
                    <a href="myprofile.php" class="text-decoration-none link-light">
                        <h3 class="text-danger">My Profile</h3>
                        <img src="<?php echo $templateParams['imgProfile']; ?>" class="rounded-circle" height="55"
                            width="55" alt="Avatar">
                    </a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item mt-2">Follower
                            <span class="badge bg-primary rounded-pill ms-2">
                                <?php echo $templateParams["nFollowers"]; ?>
                            </span>
                        </li>
                        <li class="list-group-item mt-2">Follow

                            <span class="badge bg-primary rounded-pill ms-4">
                                <?php echo $templateParams["nFollowing"]; ?>
                            </span>
                        </li>
                        <li class="list-group-item mt-2">
                            <?php if (($templateParams["nTracks"]) < 5): ?>
                                <span class="badge bg-success">Principiante</span>
                            <?php elseif (($templateParams["nTracks"]) < 10 && ($templateParams["nTracks"]) > 5): ?>
                                <span class="badge bg-warning">Intermedio</span>
                            <?php elseif (($templateParams["nTracks"]) >= 10): ?>
                                <span class="badge bg-danger">Pilota</span>
                            <?php endif; ?>

                        </li>
                    </ul>
                </div>
                <div class="d-flex align-self-start pt-3">
                    <a href="logout.php" class="text-decoration-none link-light">
                        <button type="button" class="btn btn-outline-danger">Logout <span
                                class="bi bi-sign-stop"></span></button>
                    </a>
                </div>
            </div>
            <!--fine colonna a sinistra-->

            <!--colonna MAIN-->
            <div class="col-sm-7">
                <?php
                require($templateParams["inserimento"]);
                ?>
                <?php
                require($templateParams["lista"]);
                ?>
            </div>
            <!--fine colonna MAIN-->

            <!--colonna a destra-->
            <!--hidden solo quando on sm display-->
            <div class="col-sm-2 border-start shadow rounded-2 bg-white mt-3 p-2 d-none d-sm-block align-self-start">
                <!--Filter forms-->
                <div class="rounded-3 bg-white m-2 p-2">
                    <form>
                        <h4>Filter</h4>
                        <div class="form-floating my-2">
                            <select class="form-select border-primary" id="Type"
                                aria-label="Floating label select example">
                                <option selected>Tutto</option>
                                <option value="1">Road</option>
                                <option value="2">Off-Road</option>
                                <option value="3">Dual</option>
                            </select>
                            <label for="Type">Tipo</label>
                        </div>
                        <div class="form-floating my-2">
                            <select class="form-select border-primary" id="Region"
                                aria-label="Floating label select example">
                                <option selected>Tutto</option>
                                <option value="1">Nord</option>
                                <option value="2">Centro</option>
                                <option value="2">Sud</option>
                            </select>
                            <label for="Region">Regione</label>
                        </div>
                        <div class="form-floating my-2">
                            <select class="form-select border-primary" id="kmFilter"
                                aria-label="Floating label select example">
                                <option selected>Tutto</option>
                                <option value="1">0km - 50km</option>
                                <option value="2">50km - 100km</option>
                                <option value="3">100km - 150km</option>
                                <option value="2">more 150km</option>
                            </select>
                            <label for="kmFilter">Lunghezza</label>
                        </div>
                        <button type="submit" class="btn btn-danger my-2">Filter <span
                                class="bi bi-filter"></span></button>
                    </form>
                </div>
                <!--Order by-->
                <!--Filter forms-->
                <div class="rounded-3 bg-white m-2 p-2">
                    <form>
                        <h4>Order by</h4>
                        <div class="form-floating my-2">
                            <select class="form-select border-primary" id="Type"
                                aria-label="Floating label select example">
                                <option selected>Più recente</option>
                                <option value="1">Meno recente</option>
                            </select>
                            <label for="Type">Data</label>
                        </div>
                        <button type="submit" class="btn btn-danger my-2">Order <span
                                class="bi bi-arrow-down-up"></span></button>
                    </form>
                </div>
            </div>
            <!--fine colonna a destra-->
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
    <script src="js/main.js"></script>

</html>