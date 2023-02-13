<!--Filter forms-->
<div class="rounded-3 bg-white m-2 p-2">
    <form id="formTracFilter" action="track.php" method="post">
        <h4>Filter</h4>
        <strong>Tutti i post disponibili</strong>
        <div class="form-floating my-2">
            <select class="form-select border-primary" id="typeFilter" name="typeFilter" aria-label="Floating label select example">
                <option selected>Tutto</option>
                <option value="Road">Road</option>
                <option value="Off-Road">Off-Road</option>
                <option value="Dual">Dual</option>
            </select>
            <label for="typeFilter">Tipo</label>
        </div>
        <div class="form-floating my-2">
            <select class="form-select border-primary" id="regionFilter" name="regionFilter" aria-label="Floating label select example">
                <option selected>Tutto</option>
                <option value="Nord">Nord</option>
                <option value="Centro">Centro</option>
                <option value="Sud">Sud</option>
            </select>
            <label for="regionFilter">Regione</label>
        </div>
        <div class="form-floating my-2">
            <select class="form-select border-primary" id="kmFilter" name="kmFilter" aria-label="Floating label select example">
                <option selected>Tutto</option>
                <option value="50">0km - 50km</option>
                <option value="100">50km - 100km</option>
                <option value="150">100km - 150km</option>
            </select>
            <label for="kmFilter">Lunghezza</label>
        </div>
        <button type="submit" class="btn btn-danger my-2" value="Submit" Form="formTracFilter"
            id="inputOrder1">Filter <span class="bi bi-filter"></span></button>
    </form>
</div>
<!--Order by-->
<!--Filter forms-->
<div class="rounded-3 bg-white m-2 p-2">
    <form id="formTrackOrder" action="track.php" method="post">
        <h4>Order by</h4>
        <div class="form-floating my-2">
            <select class="form-select border-primary" id="date" name="date" aria-label="Floating label select example">
                <option selected>Più recente</option>
                <option value="1">Meno recente</option>
            </select>
            <label for="date">Data</label>
        </div>
        <button type="submit" class="btn btn-danger my-2" value="Submit" Form="formTrackOrder"
            id="inputOrder">Order <span class="bi bi-arrow-down-up"></span></button>
    </form>
</div>