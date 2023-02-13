<!--post-->
<?php foreach ($dbh->getPostByUser($templateParams["profile"]) as $Post): ?>
    <!--Post Card-->
    <div class="bg-white p-4 rounded border border-danger mt-3 container">
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
                <div class="col sm-6"></div>
                <?php if ($Post["Username"] == $_SESSION["username"]) { ?>
                    <form action="#" method="post" name="deletePostForm<?php echo $Post["PostID"]?>" id="deletePostForm<?php echo $Post["PostID"]?>">
                    <input type="hidden" id="deletePostID<?php echo $Post["PostID"]?>" name="deletePostID" value="<?php echo $Post["PostID"] ?>">
                    <button class="btn btn-danger rounded-3 content-justify-end" id="deletePostButton<?php echo $Post["PostID"]?>" name="deletePostButton" 
                        form="deletePostForm<?php echo $Post["PostID"]?>">
                        Elimina
                        <span class="bi bi-trash"></span>
                    </button>
                    </form>
                <?php } ?>
            </div>
            <div class="col-sm-5">

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
                                data-bs-target="#collapsePost<?php echo $Post["PostID"] ?>" aria-expanded="false"
                                aria-controls="collapsePost<?php echo $Post["PostID"] ?>">
                                <span class="fas fa-comment-alt me-2"></span>
                                Commenta ...
                            </button>

                        </div>
                        <!-- comment expand -->
                        <div id="collapsePost<?php echo $Post["PostID"] ?>" class="accordion-collapse collapse"
                            aria-labelledby="collapsePost<?php echo $Post["PostID"] ?>" data-bs-parent="#accordionExample">
                            <hr />
                            <div class="accordion-body">
                                <!-- comment 1 -->
                                <?php foreach ($dbh->getCommentPost($Post["PostID"]) as $comment): ?>
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
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- create comment -->
                                <form class="d-flex my-1" id="formNewComment" action="myprofile.php" method="post">
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
                                    <input type="hidden" id="postID<?php echo $Post["PostID"] ?>" name="postID" value="<?php echo $Post["PostID"] ?>">
                                    <input type="text" class="form-control border shadow-sm rounded-pill bg-gray"
                                        id="CommentInput<?php echo $Post["PostID"] ?>" name="CommentInput" placeholder="Write a comment" />
                                        <label for="CommentInput<?php echo $Post["PostID"] ?>" hidden>CommentInput</label>
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