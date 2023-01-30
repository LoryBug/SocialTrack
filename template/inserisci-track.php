<!--new TRACK card-->
<form id="formNewTrack" action="track.php" method="post">
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
                    <span class="input-group-text"> <em class="bi bi-pencil-square ps-2"></em></span>
                    <textarea class="form-control" aria-label="With textarea" id="textAreaTrack" name="textAreaTrack"
                        placeholder="Pubblica un nuovo tracciato ..."></textarea>
                </div>
                <div class="row align-items-center mt-4">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Km</label>
                        <input min="10" max="200" type="number" class="form-control" id="lengthTrack" name="lengthTrack"
                            placeholder="Lunghezza km">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select" aria-label="Default select example" id="typeTrack" name="typeTrack">
                            <option selected>Road</option>
                            <option value="Off-Road">Off-Road</option>
                            <option value="Dual">Dual</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select" aria-label="Default select example" id="RegionTrack"
                            name="RegionTrack">
                            <option selected>Nord</option>
                            <option value="Centro">Centro</option>
                            <option value="Sud">Sud</option>
                        </select>
                    </div>
                </div>
                <h6 class="text-start mt-3">Inserisci GPX</h6>
                <input type="file" class="form-control mt-1" id="GPXInput" name="GPXInput"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <h6 class="text-start mt-3">Inserisci immagine</h6>
                <div class="input-group mt-1">
                    <input type="file" class="form-control" id="ImgInput" name="ImgInput"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" value="Submit" Form="formNewTrack"
                        id="inputGroupFileAddon04">Pubblica</button>
                </div>
            </div>
        </div>
    </div>
</form>