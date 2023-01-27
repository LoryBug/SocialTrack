<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--main css-->
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php echo $templateParams["titolo"]; ?>
    </title>
</head>

<body>
    <!--login-->
    <!--due colonne-->
    <div class="container d-flex flex-column flex-lg-row justify-content-evenly mt-5 pt-5">
        <!--heading-->
        <div class="text center text-lg-start mt-lg-5 pt-lg-5">
            <h1 class="fw-bold fs-0 ">Social Track</h1>
            <p class="w-75 mx-auto mx-lg-0 fs-4 text-primary">Il Social Network nato per i biker e ideato da biker</p>
        </div>
        <!--form-->
        <div style="max-width: 28 rem; width: 100%;">
            <div class="bg-white shadow rounded p-3 input-group-lg">
                <form action="login.php" method="post">

                    <h2 class="text-center">Login</h2>
                    <input type="username" class="form-control my-3" placeholder="Usermame" name="username"
                        id="username">
                    <label for="username" class="form-label" hidden>username</label>
                    <input type="password" class="form-control my-3" placeholder="Password" name="password"
                        id="password">
                    <label for="password" class="form-label" hidden>password</label>
                    <input class="btn btn-danger w-100 my-3" type="submit" value="Start to race">

                </form>

                <div class="form-check ms-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remind me
                    </label>
                </div>
                <!--create account-->
                <hr />

                <div class="text-center my-4">
                    <button class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create new Account
                    </button>
                </div>
                <!--create sing-up pop-up MODAL-->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- head -->
                            <div class="modal-header">
                                <div>
                                    <h2 class="modal-title" id="createModalLabel">Sign-up</h2>
                                    <p class="text-muted fs-7">It's fast like your bike</p>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- body -->
                            <div class="modal-body">
                                <form>
                                    <!-- name -->

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Nome">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Cognome">
                                        </div>
                                    </div>
                                    <form action="login.php" method="post">
                                        <!-- username,email e pass -->
                                        <input type="username" class="form-control my-3" placeholder="Usermame"
                                            name="username" id="username">
                                        <input type="email" class="form-control my-3" placeholder="Email address"
                                            name="email" id="email">
                                        <input type="password" class="form-control my-3" placeholder="New password"
                                            name="password" id="password">
                                        
                                    </form>
                                    <!-- Regione -->
                                    <div class="row my-3">
                                        <span class="text-muted fs-7">
                                            Regione
                                        </span>
                                        <div class="col">
                                            <select class="form-select">
                                                <option value="1">Nord</option>
                                                <option value="2">Centro</option>
                                                <option value="3">Sud</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- disclaimer -->

                                    <!-- button footer-->
                                    <div class="text-center mt-3">
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-dismiss="modal">
                                            Sign-up
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--finish sign-up pop-up-->
            </div>
        </div>
    </div>
    <!--footer-->
    <footer class="footer fixed-bottom mt-5 p-4 bg-dark text-white text-center pt-3">
        <a href="#" class="text-decoration-none link-light">
            <h3>SocialTrack</h3>
        </a>
        <p class="text-center text-muted">© 2023 Socialtrack by Leoni, Casamenti</p>
    </footer>
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- main js-->
    <script src="js/main.js"></script>
</body>

</html>