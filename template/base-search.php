<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php echo $templateParams["titolo"]; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--style css-->
    <link rel="stylesheet" href="#">
</head>

<body class="bg-white">

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <strong class="fs-3">Socialtrack</strong>
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
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-white d-block mx-0 d-sm-none">Logout <span
                                    class="bi bi-sign-stop"></span>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" method="get" action="search.php" name="formSearchUser" id="formSearchUser">
                    <input class="form-control me-2" type="search" name="filter" placeholder="Search"
                        aria-label="Search" id="filter">
                        <label for="filter" hidden >filter</label>
                    <button class="btn btn-light" type="submit" form="formSearchUser"><span
                            class="bi bi-search"></span></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container text-center border shadow my-4 p-4">
        <?php require($templateParams["lista"]); ?>
    </div>
    <footer class="p-4 bg-dark text-white text-center mt-4 pt-3">
        <a href="#" class="text-decoration-none link-light">
            <strong class="fs-3">SocialTrack</strong>
        </a>
        <p class="text-center text-muted">© 2023 Socialtrack by Leoni, Casamenti</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>