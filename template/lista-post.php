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
                                    <div class="d-flex align-items-center my-1">
                                        <!-- avatar -->
                                        <img src="<?php echo $comment["ProfileImg"]?>" height="50" width="50" alt="">
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
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- create comment -->
                                <form class="d-flex my-1">
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