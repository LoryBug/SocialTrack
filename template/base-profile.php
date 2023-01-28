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

   

    <div class="container text-center border shadow mt-4 pt-4">
        <div class="container">
            <div class="profile">
                <div class="profile-header">
                    <div class="profile-header-cover"></div>
                    <div class="profile-header-content">
                        <div class="profile-header-img bg-success">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                        </div>
                        <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link " id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Followers</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Following</a>
                            <a class="nav-link " id="nav-disabled-tab" data-bs-toggle="tab" href="#nav-disabled"
                                role="tab" aria-controls="nav-disabled" tabindex="-1" aria-disabled="true">Posts</a>
                            <a class="nav-link " id="nav-disabled-tab" data-bs-toggle="tab" href="#nav-disabled"
                                role="tab" aria-controls="nav-disabled" tabindex="-1" aria-disabled="true">Tracks</a>
                            <a class="nav-link " id="nav-disabled-tab" data-bs-toggle="tab" href="#nav-disabled"
                                role="tab" aria-controls="nav-disabled" tabindex="-1" aria-disabled="true">Notifiche</a>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="profile-content pt-2">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tab-content p-0">
                                                <div class="tab-pane fade active show" id="profile-followers">
                                                    <div class="list-group">
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Ethel
                                                                        Wilkes</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">North Raundspic</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#"
                                                                        class="text-dark font-weight-600">Shanaya
                                                                        Hansen</a></div>
                                                                <div class="text-muted fs-13px">North Raundspic</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">James
                                                                        Allman</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">North Raundspic</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Marie
                                                                        Welsh</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">Crencheporford</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Lamar
                                                                        Kirkland</a></div>
                                                                <div class="text-muted fs-13px">Prince Ewoodswan</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#"
                                                                        class="text-dark font-weight-600">Bentley
                                                                        Osborne</a></div>
                                                                <div class="text-muted fs-13px">Red Suvern</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Ollie
                                                                        Goulding</a></div>
                                                                <div class="text-muted fs-13px">Doa</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar8.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Hiba
                                                                        Calvert</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">Stemunds</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Rivka
                                                                        Redfern</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">Fallnee</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#"
                                                                        class="text-dark font-weight-600">Roshni
                                                                        Fernandez</a></div>
                                                                <div class="text-muted fs-13px">Mount Lerdo</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                    </div>
                                                    <div class="text-center p-3">
                                                        <a href="#" class="text-dark text-decoration-none">Show more <b
                                                                class="caret"></b></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="profile-content pt-2">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tab-content p-0">
                                                <div class="tab-pane fade active show" id="profile-followers">
                                                    <div class="list-group">
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Ethel
                                                                        Wilkes</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">North Raundspic</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#"
                                                                        class="text-dark font-weight-600">Shanaya
                                                                        Hansen</a></div>
                                                                <div class="text-muted fs-13px">North Raundspic</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">James
                                                                        Allman</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">North Raundspic</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Marie
                                                                        Welsh</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">Crencheporford</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Lamar
                                                                        Kirkland</a></div>
                                                                <div class="text-muted fs-13px">Prince Ewoodswan</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#"
                                                                        class="text-dark font-weight-600">Bentley
                                                                        Osborne</a></div>
                                                                <div class="text-muted fs-13px">Red Suvern</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Ollie
                                                                        Goulding</a></div>
                                                                <div class="text-muted fs-13px">Doa</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar8.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Hiba
                                                                        Calvert</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">Stemunds</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#" class="text-dark font-weight-600">Rivka
                                                                        Redfern</a>
                                                                </div>
                                                                <div class="text-muted fs-13px">Fallnee</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt="" width="50px" class="rounded-sm ml-n2" />
                                                            <div class="flex-fill pl-3 pr-3">
                                                                <div><a href="#"
                                                                        class="text-dark font-weight-600">Roshni
                                                                        Fernandez</a></div>
                                                                <div class="text-muted fs-13px">Mount Lerdo</div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                                        </div>
                                                    </div>
                                                    <div class="text-center p-3">
                                                        <a href="#" class="text-dark text-decoration-none">Show more <b
                                                                class="caret"></b></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-disabled" role="tabpanel"
                                aria-labelledby="nav-disabled-tab">Lorem ipsum dolor sit amet consectetur, adipisicing
                                elit. Laudantium minima repellat incidunt facilis obcaecati blanditiis corrupti ad
                                officia doloribus ullam sapiente ipsum, nemo a, excepturi voluptatem voluptatibus velit
                                eum dignissimos ut, nam tempora? Reiciendis illo itaque veritatis eligendi fuga,
                                mollitia ratione totam veniam esse in.</div>
                        </div>
                        <!--  <ul class="profile-header-tab nav nav-tabs nav-tabs-v2">
                            <li class="nav-item">
                                <a href="#profile-post" class="nav-link" data-toggle="tab">
                                    <div class="nav-field">Posts</div>
                                    <div class="nav-value">382</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-followers" class="nav-link active" data-toggle="tab">
                                    <div class="nav-field">Followers</div>
                                    <div class="nav-value">1.3m</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-media" class="nav-link" data-toggle="tab">
                                    <div class="nav-field">Photos</div>
                                    <div class="nav-value">1,397</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-media" class="nav-link" data-toggle="tab">
                                    <div class="nav-field">Videos</div>
                                    <div class="nav-value">120</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-followers" class="nav-link" data-toggle="tab">
                                    <div class="nav-field">Following</div>
                                    <div class="nav-value">2,592</div>
                                </a>
                            </li>
                        </ul>-->
                    </div>
                </div>

               <!-- <div class="profile-container">
                    <div class="profile-sidebar">
                        <div class="desktop-sticky-top">
                            <h4>John Smith</h4>
                            <div class="font-weight-600 mb-3 text-muted mt-n2">@johnsmith</div>
                            <p>
                                Principal UXUI Design &amp; Brand Architecture for Studio. Creator of SeanTheme.
                                Bringing the world closer together. Studied Computer Science and Psychology at Harvard
                                University.
                            </p>
                            <div class="mb-1"><i class="fa fa-map-marker-alt fa-fw text-muted"></i> New York, NY</div>
                            <div class="mb-3"><i class="fa fa-link fa-fw text-muted"></i> seantheme.com/studio</div>
                            <hr class="mt-4 mb-4" />
                        </div>
                    </div>

                    <div class="profile-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="tab-content p-0">
                                    <div class="tab-pane fade active show" id="profile-followers">
                                        <div class="list-group">
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Ethel Wilkes</a>
                                                    </div>
                                                    <div class="text-muted fs-13px">North Raundspic</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Shanaya
                                                            Hansen</a></div>
                                                    <div class="text-muted fs-13px">North Raundspic</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">James Allman</a>
                                                    </div>
                                                    <div class="text-muted fs-13px">North Raundspic</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Marie Welsh</a>
                                                    </div>
                                                    <div class="text-muted fs-13px">Crencheporford</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Lamar
                                                            Kirkland</a></div>
                                                    <div class="text-muted fs-13px">Prince Ewoodswan</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Bentley
                                                            Osborne</a></div>
                                                    <div class="text-muted fs-13px">Red Suvern</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Ollie
                                                            Goulding</a></div>
                                                    <div class="text-muted fs-13px">Doa</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Hiba Calvert</a>
                                                    </div>
                                                    <div class="text-muted fs-13px">Stemunds</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Rivka Redfern</a>
                                                    </div>
                                                    <div class="text-muted fs-13px">Fallnee</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                                    width="50px" class="rounded-sm ml-n2" />
                                                <div class="flex-fill pl-3 pr-3">
                                                    <div><a href="#" class="text-dark font-weight-600">Roshni
                                                            Fernandez</a></div>
                                                    <div class="text-muted fs-13px">Mount Lerdo</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary">Follow</a>
                                            </div>
                                        </div>
                                        <div class="text-center p-3">
                                            <a href="#" class="text-dark text-decoration-none">Show more <b
                                                    class="caret"></b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>

    </div>


    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Socialtrack by Leoni, Casamenti</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>