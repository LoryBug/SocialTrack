<?php foreach ($dbh->getNotifica($_SESSION["username"]) as $Notific): ?>
    <div class="row my-2">
        <?php if ($Notific["Checked"] == 0): ?>      
                <div class="col sm-7 border border-3 border-primary shadow-sm rounded-3">
        <?php else: ?>
            <div class="col sm-7 border shadow-sm rounded-3">
            <?php endif; ?>
            <div class="d-flex align-items-center p-2">
                <img src="<?php echo $Notific["Comment_profileImg"]; ?>" class="rounded-circle me-2" alt="" width="50px"
                    height="50px" class="rounded-sm ml-n2" />
                <div class="d-flex-fill pl-3 pr-3 ps-4">
                    <div class="row">
                        <p>
                            <strong>
                                <?php echo $Notific["Comment_username"]; ?>
                            </strong>

                            <?php echo $Notific["Notific_text"]; ?> un tuo post!
                        </p>

                    </div>

                </div>
            </div>
        </div>

    </div>


<?php endforeach; ?>