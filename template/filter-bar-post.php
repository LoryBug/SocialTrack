<!--Order by-->
<!--Filter forms-->
<div class="rounded-3 bg-white m-2 p-2">
    <form id="formOrderBy" action="index.php" method="post">
        <h4>Order by</h4>
        <div class="form-floating my-2">
            <select class="form-select border-primary" id="date" name="date" aria-label="Floating label select example">
                <?php if (isset($_POST["date"]) && $_POST["date"] == "1") { ?>
                    <option>Più recente</option>
                    <option selected value="1">Meno recente</option>
                <?php } else { ?>
                    <option selected>Più recente</option>
                    <option value="1">Meno recente</option>
                <?php } ?>
            </select>
            <label for="date">Data</label>
        </div>
        <button type="submit" class="btn btn-danger my-2" type="submit" value="Submit" Form="formOrderBy"
            id="inputOrder">Order <span class="bi bi-arrow-down-up"></span></button>
    </form>
</div>
<!--prossime gare-->
<div class="rounded-3 bg-white m-2 p-2">
    <h4>Prossimi eventi</h4>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active rounded-3">
                <img src="upload/Imola_logo.jpg" class="d-block w-100" alt="circuito imola" width="150" height="200">
                <hr>
                <strong>Imola 5 marzo 2023 15:00</strong>
            </div>
            <div class="carousel-item rounded-3">
                <img src="upload/mugello_logo.png" class="d-block w-100" alt="mugello logo" width="150" height="200">
                <hr>
                <strong>Mugello 23 aprile 2023 16:30</strong>
            </div>
            <div class="carousel-item rounded-3">
                <img src="upload/ads_logo.png" class="d-block w-100" alt="ads image" width="150" height="200">
                <hr>
                <strong>Compra subito con i saldi!!</strong>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon  bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>