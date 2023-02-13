<?php foreach ($dbh->getUserFollowing($templateParams["profile"]) as $Following): ?>

    <div class="row my-2">
        <div class="col sm-7 border shadow-sm rounded-3">
            <div class="d-flex align-items-center p-2">
                <img src="<?php echo $Following["ProfileImg"]; ?>" class="rounded-circle me-2" alt="" width="50px"
                    height="50px" class="rounded-sm ml-n2" />
                <div class="flex-fill pl-3 pr-3 ps-4">
                    <div><a href="myprofile.php?user=<?php echo $Following["FOL_Username"]; ?>"
                            class="fw-bold text-decoration-none text-dark">
                            <?php echo $Following["FOL_Username"]; ?>
                        </a>
                    </div>
                    <div class="text-muted fs-13px">
                        <a href="mailto:<?php echo $Following["Email"]; ?>" class="text-decoration-none text-dark">
                            <?php echo $Following["Email"]; ?></a>
                    </div>
                </div>

                <?php if ($Following["FOL_Username"] == $_SESSION["username"]): ?>

                <?php else: ?>
                    
                    <?php if (in_array($Following["FOL_Username"], multiDimArrayToArray($templateParams["session_following"]))): ?>
                        <form id="formUnfollowlist_f<?php echo $Follower["Username"]; ?>" action="#" method="post">
                            <input type="hidden" id="following_username<?php echo $Following["FOL_Username"]; ?>" name="following_username"
                                value="<?php echo $Following["FOL_Username"]; ?>">
                            <input class="btn btn-outline-primary" type="submit" name="unfollowlist_following" value="Unfollow"
                                form="formUnfollowlist_f<?php echo $Follower["Username"]; ?>">
                        </form>
                    <?php else: ?>
                        <form id="formFollowlist_f<?php echo $Follower["Username"]; ?>" action="#" method="post">
                            <input type="hidden" id="following_username<?php echo $Following["FOL_Username"]; ?>" name="following_username"
                                value="<?php echo $Following["FOL_Username"]; ?>">
                            <input class="btn btn-primary" type="submit" name="followlist_following" value="Follow" form="formFollowlist_f<?php echo $Follower["Username"]; ?>">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>

    </div>


<?php endforeach; ?>