<?php foreach ($dbh->getUserFollowers($templateParams["profile"]) as $Follower): ?>
    <div class="row my-2">
        <div class="col sm-7 border shadow-sm rounded-3">
            <div class="d-flex align-items-center p-2">
                <img src="<?php echo $Follower["ProfileImg"]; ?>" class="rounded-circle me-2" alt="" width="50px"
                    height="50px" class="rounded-sm ml-n2" />
                <div class="flex-fill pl-3 pr-3 ps-4">
                    <div><a href="myprofile.php?user=<?php echo $Follower["Username"]; ?>"
                            class="fw-bold text-decoration-none text-dark">
                            <?php echo $Follower["Username"]; ?>
                        </a>
                    </div>
                    <div class="text-muted fs-13px">
                        <a href="mailto:<?php echo $Follower["Email"]; ?>" class="text-decoration-none text-dark">
                            <?php echo $Follower["Email"]; ?></a>

                    </div>
                </div>

                <?php if ($Follower["Username"] == $_SESSION["username"]): ?>

                <?php else: ?>
                    <?php if (in_array($Follower["Username"], multiDimArrayToArray($templateParams["session_following"]))): ?>
                        <form id="formUnfollowlist<?php echo $Follower["Username"]; ?>" action="#" method="post">
                            <input type="hidden" id="follower_username<?php echo $Follower["Username"]; ?>" name="follower_username"
                                value="<?php echo $Follower["Username"]; ?>">
                            <input class="btn btn-outline-primary" type="submit" name="unfollowlist" value="Unfollow"
                                form="formUnfollowlist<?php echo $Follower["Username"]; ?>">
                        </form>

                    <?php else: ?>
                        <form id="formFollowlist<?php echo $Follower["Username"]; ?>" action="#" method="post">
                            <input type="hidden" id="follower_username<?php echo $Follower["Username"]; ?>" name="follower_username"
                                value="<?php echo $Follower["Username"]; ?>">
                            <input class="btn btn-primary" type="submit" name="followlist" value="Follow"
                                form="formFollowlist<?php echo $Follower["Username"]; ?>">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>


<?php endforeach; ?>