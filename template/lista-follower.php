<?php foreach ($dbh->getUserFollowers($_SESSION['username']) as $Follower): ?>
    <div class="row my-2">
        <div class="col sm-7 border shadow-sm rounded-3">
            <div class="d-flex align-items-center p-2">
                <img src="<?php echo $Follower["ProfileImg"]; ?>" class="rounded-circle me-2" alt="" width="50px"
                    height="50px" class="rounded-sm ml-n2" />
                <div class="flex-fill pl-3 pr-3 ps-4">
                    <div><a href="#" class="fw-bold text-decoration-none text-dark">
                            <?php echo $Follower["Username"]; ?>
                        </a>
                    </div>
                    <div class="text-muted fs-13px">
                        <a href="mailto:<?php echo $Follower["Email"]; ?>" class="text-decoration-none text-dark">
                            <?php echo $Follower["Email"]; ?></a>

                    </div>
                </div>
                <a href="#" class="btn btn-primary">Follow</a>
            </div>
        </div>

    </div>


<?php endforeach; ?>