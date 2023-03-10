<?php $filtro = $_GET['filter']; ?>
<?php foreach ($dbh->getAllUser($_SESSION["username"]) as $user): ?>
    <?php if (str_contains(strtolower($user["Username"]), strtolower($filtro))) { ?>
        <div class="row my-2">
            <div class="col sm-7 border shadow-sm rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img src="<?php echo $user["ProfileImg"]; ?>" class="rounded-circle me-2 ml-n2" alt="" width="50" height="50"/>
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
                        <form id="formUnfollow_search<?php echo $user["Username"]?>" action="search.php?filter=<?php echo $_GET['filter'];?>" method="post">
                            <input type="hidden" id="follower_username<?php echo $user["Username"]?>" name="follower_username"
                                value="<?php echo $user["Username"]; ?>">
                            <input class="btn btn-outline-primary" type="submit" id="unfollowlist<?php echo $user["Username"]?>" name="unfollowlist" value="Unfollow"
                                form="formUnfollow_search<?php echo $user["Username"]?>">
                        </form>

                    <?php else: ?>
                        <form id="formFollow_search<?php echo $user["Username"]?>" action="search.php?filter=<?php echo $_GET['filter'];?>" method="post">
                            <input type="hidden" id="follower_username<?php echo $user["Username"]?>" name="follower_username"
                                value="<?php echo $user["Username"]; ?>">
                            <input class="btn btn-primary" type="submit" id="followlist<?php echo $user["Username"]?>" name="followlist" value="Follow"
                             form="formFollow_search<?php echo $user["Username"]?>">
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

<?php endforeach; ?>