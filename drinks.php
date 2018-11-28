<?php
$title = "Index.php pradinis puslapis";
include 'header.php';?>

    <h3> Drinks</h3>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="beerName" class="sr-only">Pavadinimas</label>
            <input type="text" class="form-control" id="beerName" placeholder="Utenos mėlynas">
        </div>
        <div class="form-group row">
            <div class="col-sm-7">
                <select class="form-control dropdown-toggle" name="manufacturer" id="sel1">
                    <option value="" selected disabled hidden>Gamintojas</option>
                    <?php 
                    $sql = "SELECT * FROM manufacturer";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>';
                    } 
                    ?>
                </select>
            </div>
            <div class="col-sm-1"><button class="btn" type="submit" name="add" value="add">+</button></div>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="alcoholVolume" placeholder="Alkoholio kiekis %">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-7">
                <select class="form-control dropdown-toggle" name="type" id="sel1">
                    <option value="" selected disabled hidden>Tipas</option>
                    <?php 
                    $sql = "SELECT * FROM type";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>';
                    } 
                    ?>
                </select>
            </div>
            <div class="col-sm-1"><button class="btn" type="submit" name="add" value="add">+</button></div>
            
            <div class="col-sm-3">
                <select class="form-control dropdown-toggle" name="countrie" id="sel1">
                    <option value="" selected disabled hidden>Šalis</option>
                    <?php 
                        $sql = "SELECT * FROM countries";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()){
                            echo '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>';
                        } 
                    ?>
                </select>
            </div>
            <div class="col-sm-1">
                <button class="btn" type="submit" name="add" value="add">+</button>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <input type="text" class="form-control" id="ibu" placeholder="IBU">
            </div>
            <div class="col-sm-3">
                <select class="form-control dropdown-toggle" name="tare" id="sel1">
                    <option value="" selected disabled hidden>Tara</option>
                    <?php 
                    $sql = "SELECT * FROM tare";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>';
                    } 
                    ?>
                </select>
            </div>
            <div class="col-sm-1"><button class="btn" type="submit" name="add" value="add">+</button></div>
            <div class="col-sm-3">
                <select class="form-control dropdown-toggle" name="color" id="sel1">
                    <option value="" selected disabled hidden>Stilius</option>
                    <?php 
                    $sql = "SELECT * FROM style";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>';
                    } 
                    ?>
                </select>
            </div>
            <div class="col-sm-1"><button class="btn" type="submit" name="add" value="add">+</button></div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Įkelti</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Alaus nuotrauką</label>
                </div>
            </div>
        </div>
    </form>

<?php include 'footer.php'; ?>