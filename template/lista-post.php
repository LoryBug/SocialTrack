<!--new post card-->
<form action="index.php" method="post">
    <div class="bg-white p-4 rounded shadow mt-3 container">
        <div class="row">
            <!-- avatar -->
            <div class="d-flex">
                <img src="upload/GC_default.JPG" alt="avatar" class="rounded-circle me-2"
                    style="width: 38px; height: 38px; object-fit: cover" />
                <div>
                    <p class="m-0 fw-bold">GiammaC</p>
                </div>
            </div>
            <div class="my-2">
                <div class="input-group">
                    <span class="input-group-text"> <em class="bi bi-pencil-square ps-2"></em></span>

                    <textarea class="form-control" aria-label="With textarea"
                        placeholder="Scrivi un nuovo post ..."></textarea>
                </div>
                <div class="input-group mt-4">
                    <input type="file" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Pubblica</button>
                </div>
            </div>
</form>


</div>
</div>
<!--post-->
<?php foreach ($dbh->getLatestPosts() as $Post): ?>
    <!--Post Card-->
    <div class="bg-white p-4 rounded shadow mt-3 container">
        <!-- avatar -->
        <div class="row">
            <div class="d-flex">
                <img src="<?php echo $Post["ProfileImg"]; ?>" alt="avatar" class="rounded-circle me-2"
                    style="width: 38px; height: 38px; object-fit: cover" />
                <div>
                    <p class="m-0 fw-bold">
                        <?php echo $Post["Username"]; ?>
                    </p>
                    <span class="text-muted fs-7">
                        <?php echo $Post["Post_timestamp"]; ?>
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
                        <img src="<?php echo $Post["Post_image"]; ?>" alt="post image" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
            <!--Right column-->
            <div class="col-sm">
                <!-- text content -->
                <p class="my-2">
                    <?php echo $Post["Post_text"]; ?>
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
                                data-bs-target="#collapsePost1" aria-expanded="false" aria-controls="collapsePost1"
                                aria-controls="collapsePost1">
                                <i class="fas fa-comment-alt me-2"></i>
                                Commenta ...
                            </button>

                        </div>
                        <!-- comment expand -->
                        <div id="collapsePost1" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <hr />
                            <div class="accordion-body">
                                <!-- comment 1 -->
                                <?php foreach ($dbh->getCommentPost($Post["PostID"]) as $comment): ?>
<<<<<<< HEAD
                                    <div class="d-flex align-items-center my-1">
                                        <!-- avatar -->
                                        <img src="<?php echo $comment["ProfileImg"] ?>" height="50" width="50" alt="">
                                        <!-- comment text -->
                                        <div class="p-3">
                                            <p>
                                                <?php echo $comment["Comment_date"] ?>
                                            </p>
                                            <p>
                                                <?php echo $comment["Username"] ?>
                                            </p>
                                            <p>
                                                <?php echo $comment["Comment_text"] ?>
                                            </p>
=======
                                    <div class="row py-2">

                                        <div class="d-flex align-self-center">
                                            <!-- avatar -->
                                            <img src="<?php echo $comment["ProfileImg"]; ?>" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 40px; height: 40px; object-fit: cover">

                                            <!-- comment text -->
                                            <div class="w-100">
                                                <p class="fw-bold m-0 text-start">
                                                    <?php echo $comment["Username"]; ?>
                                                </p>
                                                <p class="m-0 fs-7 bg-gray rounded text-start">
                                                    <?php echo $comment["Comment_text"] ?>
                                                </p>
                                            </div>
>>>>>>> da24611589ab360075f979ac7dab2a418c38f30b
                                        </div>
                                    </div>


                                <?php endforeach; ?>
                                <!-- create comment -->
                                <form class="d-flex my-1">
                                    <!-- avatar -->
                                    <div>
                                        <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                            class="rounded-circle me-2" style="
<<<<<<< HEAD
                                                                                width: 38px;
                                                                                height: 38px;
                                                                                object-fit: cover;
                                                                              " />
=======
                                                                                                    width: 38px;
                                                                                                    height: 38px;
                                                                                                    object-fit: cover;
                                                                                                  " />
>>>>>>> da24611589ab360075f979ac7dab2a418c38f30b
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