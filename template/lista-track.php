<!--TRACK-->
<?php foreach ($dbh->getLatestTracks() as $Track): ?>
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
                <ul class="list-group">
                    <li class="list-group-item">
                        <div>
                            <div class="fw-bold">Type:</div>
                            <?php echo $Track["Track_type"]; ?>
                        </div>

                    </li>
                    <li class="list-group-item">
                        <div>
                            <div class="fw-bold">Length:</div>
                            <?php echo $Track["Track_length"]; ?>
                        </div>

                    </li>
                    <li class="list-group-item ">
                        <div>
                            <div class="fw-bold">Region:</div>
                            <?php echo $Track["Region"]; ?>
                        </div>

                    </li>
                </ul>
                <button type="button" class="btn btn-outline-danger mt-2">Download information</button>
                <!-- text content -->
                <p class="my-2">
                    <?php echo $Track["Text_description"]; ?>
                </p>
            </div>
        </div>
        <!--Comment Row-->
        <div class="row">
            <!-- like and review -->
            <div class="post__comment mt-3 position-relative">
                <!-- comments start-->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item border-0">
                        <!--button Comment-->
                        <div class="d-grid gap-2 py-4">
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePost1" aria-expanded="false" aria-controls="collapsePost1"
                                aria-controls="collapsePost1">
                                <i class="fas fa-comment-alt me-2"></i>
                                Review ...
                            </button>

                        </div>
                        <!-- review expand -->
                        <div id="collapsePost1" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
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
                                                    <?php echo $review["Review_text"] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- create review -->
                                <form class="d-flex my-1" id="formNewReview" action="track.php" method="post">
                                    <!-- avatar -->
                                    <div>
                                        <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                            class="rounded-circle me-2" style="
                                                                                                    width: 38px;
                                                                                                    height: 38px;
                                                                                                    object-fit: cover;
                                                                                                  " />
                                    </div>
                                    <!-- input -->
                                    <input type="hidden" id="trackID" name="trackID" value="<?php echo $Track["TrackID"] ?>">
                                    <!--<input type="number" class="form-control" id="trackVote" name="trackVote" placeholder="rate">-->
                                    <input type="text" class="form-control border-0 rounded-pill bg-gray" id="reviewInput"
                                        name="reviewInput" placeholder="Write a review" />
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