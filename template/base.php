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
            <a class="navbar-brand" href="#">Socialtrack</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Track</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">My Account</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit">Search</button>
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
                            <option value="1">Middle</option>
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
                    <button type="submit" class="btn btn-danger my-2">Filter</button>
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
                    <a href="#" class="text-decoration-none link-light">
                        <h3 class="text-danger">My Profile</h3>
                        <img src="upload/image-deafult.jpg" class="rounded-circle" height="55" width="55" alt="Avatar">
                    </a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item mt-2">Follower
                            <span class="badge bg-primary rounded-pill ms-2">14</span>
                        </li>
                        <li class="list-group-item mt-2">Follow
                            <span class="badge bg-primary rounded-pill ms-4">14</span>
                        </li>
                        <li class="list-group-item mt-2">
                            <span class="badge bg-success">Beginner</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--fine colonna a sinistra-->

            <!--colonna MAIN-->
            <div class="col-sm-7">
                <div class="d-flex justify-content-evenly bd-highlight mt-3">
                    <button type="button" class="btn btn-primary active">Posts <em
                            class="bi bi-people ps-2"></em></button>
                    <button type="button" class="btn btn-primary">Tracks <em class="bi bi-map ps-2"></em></button>
                </div>
                <?php
                require($templateParams["opzione"]);
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
                                <option selected>All</option>
                                <option value="1">Road</option>
                                <option value="2">Off-Road</option>
                                <option value="3">Dual</option>
                            </select>
                            <label for="Type">Select track</label>
                        </div>
                        <div class="form-floating my-2">
                            <select class="form-select border-primary" id="Region"
                                aria-label="Floating label select example">
                                <option selected>All</option>
                                <option value="1">Emiglia Romagna</option>
                                <option value="2">Lombardia</option>
                                <option value="3">Veneto</option>
                                <option value="4">Liguria</option>
                                <option value="5">Toscana</option>
                                <option value="6">Altro</option>
                            </select>
                            <label for="Region">Select Region</label>
                        </div>
                        <div class="form-floating my-2">
                            <select class="form-select border-primary" id="kmFilter"
                                aria-label="Floating label select example">
                                <option selected>All</option>
                                <option value="1">0km - 50km</option>
                                <option value="2">50km - 100km</option>
                                <option value="3">100km - 150km</option>
                                <option value="2">more 150km</option>
                            </select>
                            <label for="kmFilter">Select km range</label>
                        </div>
                        <button type="submit" class="btn btn-danger my-2">Filter</button>
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
                                <option selected>Latest</option>
                                <option value="1">Older</option>
                            </select>
                            <label for="Type">Date post</label>
                        </div>
                        <button type="submit" class="btn btn-danger my-2">Order</button>
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
</body>

</html>