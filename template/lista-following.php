<?php foreach ($dbh->getUserFollowing($templateParams["profile"]) as $Following): ?>

    <div class="row my-2">
        <div class="col sm-7 border shadow-sm rounded-3">
            <div class="d-flex align-items-center p-2">
                <img src="<?php echo $Following["ProfileImg"]; ?>" class="rounded-circle me-2" alt="" width="50px"
                    height="50px" class="rounded-sm ml-n2" />
                <div class="flex-fill pl-3 pr-3 ps-4">
                    <div><a href="myprofile.php?user=<?php echo $Following["FOL_Username"]; ?>" class="fw-bold text-decoration-none text-dark">
                            <?php echo $Following["FOL_Username"]; ?>
                        </a>
                    </div>
                    <div class="text-muted fs-13px">
                        <a href="mailto:<?php echo $Following["Email"]; ?>" class="text-decoration-none text-dark">
                            <?php echo $Following["Email"]; ?></a>
                    </div>
                </div>
                <a href="#" class="btn btn-outline-primary">Unfollow</a>
            </div>
        </div>

    </div>


<?php endforeach; ?>