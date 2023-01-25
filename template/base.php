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
                <div class="border border border-2 rounded-3 bg-white m-2 p-3">
                    <a href="#"  class="text-decoration-none link-light">
                        <h3 class="text-danger">My Profile</h3>
                        <img src="upload/image-deafult.jpg" class="rounded-circle" height="55" width="55" alt="Avatar">
                    </a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Follower
                        <span class="badge bg-primary rounded-pill ms-2">14</span>
                        </li>
                        <li class="list-group-item">Follow  
                        <span class="badge bg-primary rounded-pill ms-4">14</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--fine colonna a sinistra-->

            <!--colonna post-->
            <div class="col-sm-7">
                <!--pubblica un post-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="shadow rounded-2 bg-white mt-3 p-2">
                            <p class="fw-bold">New Post</p>
                            <div class="col-sm-1">
                                <img src="upload/image-deafult.jpg" alt="avatar" class="rounded-circle me-2"
                                    style="width: 38px; height: 38px; object-fit: cover">
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--post-->
                <?php foreach ($templateParams["postcasuali"] as $Pcasuale): ?>
                    <!--Post Card-->
                    <div class="bg-white p-4 rounded shadow mt-3 container">
                        <!-- avatar -->
                        <div class="row">
                            <div class="d-flex">
                                <img src="upload\image-deafult.jpg" alt="avatar" class="rounded-circle me-2"
                                    style="width: 38px; height: 38px; object-fit: cover" />
                                <div>
                                    <p class="m-0 fw-bold">
                                        <?php echo $Pcasuale["Username"]; ?>
                                    </p>
                                    <span class="text-muted fs-7">
                                        <?php echo $Pcasuale["Post_timestamp"]; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="row">
                            <!--Left column-->
                            <div class="col-sm">
                                <!-- image content -->
                                <div class="mt-3">
                                    <div>
                                        <img src="<?php echo $Pcasuale["Post_image"]; ?>" alt="post image"
                                            class="img-fluid rounded" />
                                    </div>
                                </div>
                            </div>
                            <!--Right column-->
                            <div class="col-sm">
                                <!-- text content -->
                                <p class="my-2">
                                    <?php echo $Pcasuale["Post_text"]; ?>
                                </p>
                            </div>
                        </div>
                        <!--Comment Row-->
                        <div class="row">
                            <!-- likes & comments -->
                            <div class="post__comment mt-3 position-relative">
                                <!-- comments start-->
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item border-0">
                                        <!--button Comment-->
                                        <div class="d-grid gap-2 py-4">
                                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapsePost1" aria-expanded="false"
                                                aria-controls="collapsePost1" aria-controls="collapsePost1">
                                                <i class="fas fa-comment-alt me-2"></i>
                                                Commenta ...
                                            </button>

                                        </div>
                                        <!-- comment expand -->
                                        <div id="collapsePost1" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <hr />
                                            <div class="accordion-body">
                                                <!-- comment 1 -->
                                                <div class="d-flex align-items-center my-1">
                                                    <!-- avatar -->
                                                    <img src="https://source.unsplash.com/random/2" alt="avatar"
                                                        class="rounded-circle me-2" style="
                                                      width: 38px;
                                                      height: 38px;
                                                      object-fit: cover;
                                                    " />
                                                    <!-- comment text -->
                                                    <div class="p-3 rounded comment__input w-100">
                                                        <p class="fw-bold m-0">Giova Nino</p>
                                                        <p class="m-0 fs-7 bg-gray p-2 rounded">
                                                            Brooo, guarda che quello è un
                                                            gsxr 1000.
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- create comment -->
                                                <form class="d-flex my-1">
                                                    <!-- avatar -->
                                                    <div>
                                                        <img src="https://source.unsplash.com/collection/happy-people"
                                                            alt="avatar" class="rounded-circle me-2" style="
                                                        width: 38px;
                                                        height: 38px;
                                                        object-fit: cover;
                                                      " />
                                                    </div>
                                                    <!-- input -->
                                                    <input type="text" class="form-control border-0 rounded-pill bg-gray"
                                                        placeholder="Write a comment" />
                                                </form>
                                                <!-- end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--fine post-->
            </div>
            <!--fine colonna post-->

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

    <footer class="mt-5 p-4 bg-dark text-white text-center py-3 my-4">
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