<!--new post card-->
<form id="formNewPost" action="index.php" method="post">
    <div class="bg-white p-4 rounded shadow mt-3 container">
        <div class="row">
            <!-- avatar -->
            <div class="d-flex">
                <img src="<?php echo $templateParams['imgProfile']; ?>" alt="avatar" class="rounded-circle me-2"
                    style="width: 38px; height: 38px; object-fit: cover" />
                <div>
                    <a class="m-0 fw-bold text-decoration-none text-black" href="myprofile.php">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                </div>
            </div>
            <div class="my-2">
                <div class="input-group">
                    <span class="input-group-text"> <em class="bi bi-pencil-square p-2"></em></span>
                    <!--testo da inserire-->
                    <textarea class="form-control" aria-label="With textarea" id="textAreaPost" name="textAreaPost"
                        placeholder="Scrivi un nuovo post ..."></textarea>
                        <label for="textAreaPost" class="form-control" hidden>textarea</label>
                </div>
                <div class="input-group mt-4">
                    <input type="file" class="form-control" id="ImgInput" name="ImgInput"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <label for="ImgInput" class="form-control" hidden>img</label>
                    <button class="btn btn-outline-secondary" type="submit" value="Submit" Form="formNewPost"
                        id="inputGroupFileAddon04">Pubblica</button>
                </div>
            </div>
        </div>
    </div>
</form>