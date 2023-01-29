<?php foreach ($dbh->getUserFollowers($_SESSION['username']) as $Follower): ?>
    <div class="row py-2">
        <div class="d-flex align-self-center">
            <!-- avatar -->
            <img src="<?php echo $Follower["ProfileImg"]; ?>" alt="avatar" class="rounded-circle me-2"
                style="width: 40px; height: 40px; object-fit: cover">

            <!-- comment text -->
            <div class="w-100">
                <p class="fw-bold m-0 text-start">
                    <?php echo $Follower["Username"]; ?>
                </p>
                <p class="m-0 fs-7 bg-gray rounded text-start">
                    <?php echo $Follower["Email"]; ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>