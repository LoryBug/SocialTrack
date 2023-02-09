<?php $filtro = $_GET['filter']; ?>
<?php foreach ($dbh->getAllUser($_SESSION["username"]) as $user): ?>
    <?php if (str_contains(strtolower($user["Username"]), strtolower($filtro))) { ?>
        <div class="row my-2">
            <div class="col sm-7 border shadow-sm rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img src="<?php echo $user["ProfileImg"]; ?>" class="rounded-circle me-2" alt="" width="50px" height="50px"
                        class="rounded-sm ml-n2" />
                    <div class="flex-fill pl-3 pr-3 ps-4">
                        <div><a href="myprofile.php?user=<?php echo $user["Username"]; ?>"
                                class="fw-bold text-decoration-none text-dark">
                                <?php echo $user["Username"]; ?>
                            </a>
                        </div>
                        <div class="text-muted fs-13px">
                            <a href="mailto:<?php echo $user["Email"]; ?>" class="text-decoration-none text-dark">
                                <?php echo $user["Email"]; ?></a>

                        </div>
                    </div>
                    <?php if (in_array($user["Username"], multiDimArrayToArray($templateParams["session_following"]))): ?>
                        <form id="formUnfollow_search" action="#" method="post">
                            <input type="hidden" id="follower_username" name="follower_username"
                                value="<?php echo $user["Username"]; ?>">
                            <input class="btn btn-outline-primary" type="submit" id="unfollowlist" name="unfollowlist" value="Unfollow"
                                form="formUnfollow_search">
                        </form>

                    <?php else: ?>
                        <form id="formFollow_search" action="#" method="post">
                            <input type="hidden" id="follower_username" name="follower_username"
                                value="<?php echo $user["Username"]; ?>">
                            <input class="btn btn-primary" type="submit" id="followlist" name="followlist" value="Follow"
                             form="formFollow_search">
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

<?php endforeach; ?>