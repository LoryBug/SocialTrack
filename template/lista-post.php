<!--post-->
<?php $listaPost = $dbh->getLatestPosts($_SESSION['username']);
if (count($listaPost) == 0) { ?>
    <div class="col sm-7 my-4 border bg-success bg-opacity-25 shadow-sm rounded-3">
        <p class="mt-3">
            <strong>Benvenuto
                <?php echo $_SESSION['username'] ?>
            </strong>
            Inizia a seguire nuovi utenti per vedere post e tracciati.
        </p>
    </div>
<?php } ?>

<?php foreach ($listaPost as $Post): ?>
    <!--Post Card-->
    <div class="bg-white p-4 rounded shadow mt-3 container">
        <!-- avatar -->
        <div class="row">
            <div class="d-flex">
                <img src="<?php echo $Post["ProfileImg"]; ?>" alt="avatar" class="rounded-circle me-2"
                    style="width: 38px; height: 38px; object-fit: cover" />
                <div>
                    <p class="m-0 fw-bold">
                        <a href="myprofile.php?user=<?php echo $Post["Username"]; ?>"
                            class="text-decoration-none text-dark"><?php echo $Post["Username"]; ?></a>

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
                                data-bs-target="#collapsePost<?php echo $Post["PostID"] ?>" aria-expanded="false"
                                aria-controls="collapsePost<?php echo $Post["PostID"] ?>">
                                <em class="fas fa-comment-alt me-2"></em>
                                Commenta ...
                            </button>

                        </div>
                        <!-- comment expand -->
                        <div id="collapsePost<?php echo $Post["PostID"] ?>" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
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
                                <form class="d-flex my-1" id="formNewComment" action="index.php" method="post">
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
                                    <input type="hidden" id="userPost" name="userPost"
                                        value="<?php echo $Post["Username"] ?>">
                                    <input type="hidden" id="postID" name="postID" value="<?php echo $Post["PostID"] ?>">
                                    <input type="text" class="form-control border shadow-sm rounded-pill bg-gray"
                                        id="CommentInput" name="CommentInput" placeholder="Write a comment" />
                                        <label for="CommentInput" class="form-control">commentInput</label>
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