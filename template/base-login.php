<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--main css-->
    <link rel="stylesheet" href="css/animation.css">
    <title>
        <?php echo $templateParams["titolo"]; ?>
    </title>
</head>

<body>
    <!--login-->
    <!--due colonne-->
    <div class="container d-flex flex-column flex-lg-row justify-content-evenly mt-3 mb-5 py-5">
        <!--heading-->
        <div class="text center text-lg-start mt-lg-5 pt-lg-5">
            <h1 class="fw-bold fs-0 ">Social Track</h1>
            <p class="w-75 mx-auto mx-lg-0 fs-4 text-primary">Il Social Network nato per i biker e ideato da biker</p>
            <img class="d-none d-sm-block" src="upload/moto-login.png" alt="icon-socialtrack">
        </div>
        <!--form-->
        <div style="width: 100%;">
            <div class="bg-white shadow rounded p-3 input-group-lg">
                <form action="login.php" method="post">

                    <h2 class="text-center">Login</h2>
                    <input type="text" class="form-control my-3" placeholder="Username" name="username"
                        id="username">
                    <label for="username" class="form-label" hidden>username</label>
                    <input type="password" class="form-control my-3" placeholder="Password" name="password"
                        id="password">
                    <label for="password" class="form-label" hidden>password</label>
                    <input class="btn btn-danger w-100 my-3" type="submit" value="Start to race">

                </form>



                <?php if (isset($templateParams["errorelogin"])): ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $templateParams["errorelogin"] ?>
                    </div>

                <?php endif; ?>
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
                                    <p class="text-muted fs-7">Iscriviti subito!! è veloce come la tua moto.</p>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- body -->
                            <div class="modal-body">
                                <form action="login.php" method="post" id="registration_form">
                                    <div class="container">
                                        <!--nome cognome-->
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Nome" id="nome">
                                                <label for="nome" class="form-label" hidden>name</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Cognome" id="cognome">
                                                <label for="cognome" class="form-label" hidden>cognome</label>
                                            </div>
                                        </div>
                                        <!-- username,email e pass -->
                                        <div class="row my-3">
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" placeholder="Username"
                                                    name="reg_username" id="reg_username">
                                                <label for="reg_username" class="form-label" hidden>reg_username</label>
                                            </div>
                                            <div class="col-sm-1 mt-1">
                                                <span class="bi bi-info-circle" data-bs-toggle="popover"
                                                    data-bs-content="Username non deve contenere spazi
                                                    o caratteri speciali"></span>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <input type="email" class="form-control" placeholder="Email address"
                                                    name="reg_email" id="reg_email">
                                                <label for="reg_email" class="form-label" hidden>reg_email</label>

                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-sm-11">
                                                <input type="password" class="form-control" placeholder="New password"
                                                    name="reg_password" id="reg_password">
                                                <label for="reg_password" class="form-label" hidden>reg_password</label>
                                            </div>
                                            <div class="col-sm-1 mt-1">
                                                <span class="bi bi-info-circle" data-bs-toggle="popover"
                                                    data-bs-content="La password deve contenere almeno 8 caratteri
                                                e almeno 2 caratteri speciali"></span>
                                            </div>
                                        </div>
                                        <!-- Regione -->
                                        <div class="row my-3">
                                            <span class="text-muted fs-7">
                                                Regione
                                            </span>
                                            <div class="col">
                                                <select class="form-select" title="region_selector" id="reg_sel">
                                                    <option value="1" title="Nord" id="nord">Nord</option>
                                                    <option value="2" title="Centro" id="centro">Centro</option>
                                                    <option value="3" title="Sud" id="sud">Sud</option>
                                                </select>
                                                <label for="reg_sel" class="" hidden>reg</label>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- button footer-->
                                    <div class="text-center mt-3">
                                        <button type="submit" value="Submit" form="registration_form"
                                            class="btn btn-primary btn-lg">
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