<!--new TRACK card-->
<form id="formNewTrack" action="track.php" method="post">
    <div class="bg-white p-4 rounded shadow mt-3 container">
        <div class="row">
            <!-- avatar -->
            <div class="d-flex">
                <img src="upload/GC_default.JPG" alt="avatar" class="rounded-circle me-2"
                    style="width: 38px; height: 38px; object-fit: cover" />
                <div>
                    <p class="m-0 fw-bold">GiammaC</p>
                </div>
            </div>
            <div class="my-2">
                <div class="input-group">
                    <span class="input-group-text"> <em class="bi bi-pencil-square ps-2"></em></span>
                    <!--testo da inserire-->
                    <textarea class="form-control" aria-label="With textarea" id="textAreaTrack" name="textAreaTrack"
                        placeholder="Pubblica un nuovo tracciato ..."></textarea>
                </div>
                <div class="row align-items-center mt-4">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Km</label>
                        <input type="number" class="form-control" id="lengthTrack" name="lengthTrack" placeholder="Length">
                    </div>
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Type</label>
                        <input type="text" class="form-control" id="typeTrack" name="typeTrack" placeholder="Type">
                    </div>
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Region</label>
                        <input type="text" class="form-control" id="RegionTrack" name="RegionTrack" placeholder="Region">
                    </div>
                </div>
                <p>DA INSERIRE GPX</p>
                <div class="input-group mt-4">
                    <input type="file" class="form-control" id="ImgInput" name="ImgInput"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" value="Submit" Form="formNewTrack"
                        id="inputGroupFileAddon04">Pubblica</button>
                </div>
            </div>
        </div>
    </div>
</form>