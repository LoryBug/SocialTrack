<!--TRACK-->
<?php $listatracciati = $dbh->getLatestTracks($_SESSION['username']);
if (count($listatracciati) == 0) { ?>
    <div class="col sm-7 my-4 border bg-success bg-opacity-25 shadow-sm rounded-3">
        <p class="mt-3">
            <strong>Benvenuto
                <?php echo $_SESSION['username'] ?>
            </strong>
            Inizia a seguire nuovi utenti per vedere post e tracciati.
        </p>
    </div>
<?php } ?>

<?php foreach ($listatracciati as $Track): ?>
    <!--Post Card-->
    <div class="bg-white p-4 rounded shadow mt-3 container">
        <!-- avatar -->
        <div class="row">
            <div class="d-flex">
                <img src="<?php echo $Track["ProfileImg"]; ?>" alt="avatar" class="rounded-circle me-2"
                    style="width: 38px; height: 38px; object-fit: cover" />
                <div>
                    <p class="m-0 fw-bold">
                        <?php echo $Track["Username"]; ?>
                    </p>
                    <span class="text-muted fs-7">
                        <?php echo $Track["Track_timestamp"]; ?>
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
                        <img src="<?php echo $Track["Track_image"]; ?>" alt="track image" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
            <!--Right column-->
            <div class="col-sm">
                <!-- track information-->
                <ul class="list-group list-group-flush d-flex align-items-start">
                    <li class="list-group-item">
                        <strong>Type:</strong>
                        <?php echo $Track["Track_type"]; ?>
                    </li>
                    <li class="list-group-item">
                        <strong> Length:</strong>
                        <?php echo $Track["Track_length"]; ?> km
                    </li>
                    <li class="list-group-item"><strong>Region:</strong>
                        <?php echo $Track["Region"]; ?>
                    </li>
                    <?php $media = (int) $dbh->getAvgrating($Track["TrackID"])[0]["media"]; ?>
                    <li class="list-group-item">
                        <strong> Voto medio:</strong>
                        <?php echo $media; ?> /5
                    </li>
                </ul>
                <hr>
                <!-- text content -->
                <h6 class="text-start mb-4">
                    <?php echo $Track["Text_description"]; ?>
                </h6>
            </div>
        </div>

        <!--Comment Row-->
        <div class="row mt-2">
            <!-- like and review -->
            <div class="post__comment mt-3 position-relative">
                <!-- comments start-->
                <div class="accordion" id="accordionExample<?php echo $Track["TrackID"] ?>">
                    <div class="accordion-item border-0">
                        <!--button Comment and Download-->
                        <div class="btn-group container-fluid" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse"
                                data-bs-target="#collapsePost<?php echo $Track["TrackID"] ?>" aria-expanded="false"
                                aria-controls="collapsePost<?php echo $Track["TrackID"] ?>">Review</button>
                            <a class="btn btn-outline-danger" href="#" download="<?php echo $Track["FileGPX"]; ?>">
                                Download
                            </a>
                        </div>
                        <!-- review expand -->
                        <div id="collapsePost<?php echo $Track["TrackID"] ?>" class="accordion-collapse collapse"
                            aria-labelledby="collapsePost<?php echo $Track["TrackID"] ?>" data-bs-parent="#accordionExample<?php echo $Track["TrackID"] ?>">
                            <hr />
                            <div class="accordion-body">
                                <!-- review -->
                                <?php foreach ($dbh->getReviewTrack($Track["TrackID"]) as $review): ?>
                                    <div class="row py-2">
                                        <div class="d-flex align-self-center">
                                            <!-- avatar -->
                                            <img src="<?php echo $review["ProfileImg"]; ?>" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 40px; height: 40px; object-fit: cover">
                                            <!-- Review text -->
                                            <div class="w-100">
                                                <p class="fw-bold m-0 text-start">
                                                    <?php echo $review["Username"]; ?>
                                                </p>
                                                <p class="m-0 fs-7 bg-gray rounded text-start">
                                                    Voto:
                                                    <?php echo $review["Review_voto"] ?>
                                                </p>
                                                <p class="m-0 fs-7 bg-gray rounded text-start">
                                                    <?php echo $review["Review_text"] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- create review -->
                                <form class="d-flex my-1" id="formNewReview<?php echo $Track["TrackID"] ?>" action="track.php" method="post">
                                    <!-- avatar -->
                                    <div>
                                        <img src="<?php echo $templateParams['imgProfile']; ?>" alt="avatar"
                                            class="rounded-circle me-2" style="
                                                                                        width: 40px;
                                                                                        height: 40px;
                                                                                        object-fit: cover;
                                                                                        " />
                                    </div>
                                    <!-- input -->
                                    <input type="hidden" id="trackID<?php echo $Track["TrackID"] ?>" name="trackID"
                                        value="<?php echo $Track["TrackID"] ?>">
                                    <input type="hidden" id="userTrack<?php echo $Track["TrackID"] ?>" name="userTrack"
                                        value="<?php echo $Track["Username"] ?>">
                                    <div class="container d-flex">
                                        <div class="row">
                                            <div class="col-sm-3 mt-1">
                                                <input type="number"
                                                    class="form-control border col-1 shadow-sm rounded-pill" id="trackVote<?php echo $Track["TrackID"] ?>"
                                                    name="trackVote" placeholder="Voto" min="1" max="5">
                                                    <label for="trackVote<?php echo $Track["TrackID"] ?>" hidden>trackVote</label>
                                            </div>
                                            <div class="col-sm-6 mt-1">
                                                <input type="text" class="form-control border shadow-sm rounded-pill"
                                                    id="reviewInput<?php echo $Track["TrackID"] ?>" name="reviewInput" placeholder="Write a review" />
                                                    <label for="reviewInput<?php echo $Track["TrackID"] ?>" hidden>reviewInput</label>
                                            </div>
                                            <div class="col-sm-3 mt-2">
                                                <button class="btn btn-outline-danger rounded-pill" type="submit"
                                                    value="Submit" Form="formNewReview<?php echo $Track["TrackID"]?>" id="inputGroupFile<?php echo $Track["TrackID"] ?>">
                                                    Pubblica
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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