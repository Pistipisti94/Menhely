<pre>
    <?php
    if (filter_input(INPUT_POST, "modoszitasok", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
        $data = $_POST;
        var_dump($_FILES);
        echo 'Kaptunk adatokat';
        if ($_FILES['kepfajl']['error'] == 0) {
            $kiterjesztes = null;
            switch ($_FILES['kepfajl']['type']) {
                case 'image/jpeg':
                    $kiterjesztes = ".jpg";
                    break;
                case 'image/png':
                    $kiterjesztes = ".png";
                    break;
                default:
                    break;
            }
            $forras = $_FILES['kepfajl']['tmp_name'];
            $cel = DIRECTORY_SEPARATOR . "allatkepek" . DIRECTORY_SEPARATOR . $data['allat_neve'] . $kiterjesztes;
            copy($forras, $cel);
        }
    } else {
        echo 'Nem kaptunk adatokat';
        $data = $db->kivalasztottAllat($id);
    }
    $allatneve = filter_input(INPUT_POST, "allatneve");
    $faj = filter_input(INPUT_POST, "faj");
    $allatid = filter_input(INPUT_POST, "allatid");
    $fajta = filter_input(INPUT_POST, "fajta");
    $szuletett = filter_input(INPUT_POST, "szuletett");
    $neme = filter_input(INPUT_POST, "neme");
    $nyilvantartas = filter_input(INPUT_POST, "nyilvantartas");
    $megjegyzes = filter_input(INPUT_POST, "megjegyzes");
    $kep = filter_input(INPUT_POST, "kep");
    $image = null;
    if (file_exists("./allatkepek/" . $data['allat_neve'] . ".jpg")) {
        $image = "./allatkepek/" . $data['allat_neve'] . ".jpg";
    } else if (file_exists("./allatkepek/" . $data['allat_neve'] . ".jpeg")) {
        $image = "./allatkepek/" . $data['allat_neve'] . ".jpeg";
    } else if (file_exists("./allatkepek/" . $data['allat_neve'] . ".png")) {
        $image = "./allatkepek/" . $data['allat_neve'] . ".png";
    } else {
        $image = "./items/noImages.png";
    }
    ?>
            
   
    
    <div class="container">
    <div class="row">
    
    <img class="kutakepe mx-auto" src="<?= $image ?>" alt="<?php $data['allat_neve'] ?>">
    <h1><?php $data['allat_neve'] ?></h1>
    </div>
    
        <form action="index.php?menu=home&id=<?php echo $data ?> " method="POST" enctype="multipart/form-data">
    <div>
    <input type="hidden" class="form-control" id="allatneve" name="allatneve" value="<?= $data['allatid'] ?>">
    </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Állat neve:</label>
                    <input type="text" class="form-control" id="allatneve" name="allatneve" value="<?= $data['allat_neve'] ?>">
            </div>
            <div class="col-4">
                <label for="faj" class="form-label">Faj:</label>
                    <input type="text" class="form-control" id="faj" name="faj" value="<?= $data['faj'] ?> ">
    </select>
            </div>
        </div>
        <div class="row">
        <div class="col-2"></div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Fajta:</label>
                    <input type="text" class="form-control" id="fajta" name="fajta" value="<?= $data['fajta'] ?>">
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Született:</label>
                    <input type="text" class="form-control" id="szuletett" name="szuletett" value="<?= $data['szuletesi_ido'] ?>">
            </div>
        </div>
        <div class="row">
        <div class="col-2"></div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Neme:</label>
                    <input type="text" class="form-control" id="neme" name="neme" value="<?= $data['nem'] ?>">
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Nyilvántartásba véve:</label>
                    <input type="text" class="form-control" id="nyilvantartas" name="nyilvantartas" value="<?= $data['nyilvantartasban'] ?>">
            </div>
        </div>
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">Megjegyzés:</label>
                    <input type="text" class="form-control" id="megjegyzes" name="megjegyzes" value="<?= $data['megjegyzes'] ?>">
            </div>
                    <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">Kép:</label>
                    <input type="file" class="form-control" id="kep" name="kep" value="">
            </div>
            
        
        
        <div class="row">
        <button onclick="update($allatid, $allatneve, $faj, $fajta, $szuletett, $neme, $nyilvantartas, $megjegyzes) type ="submit" class="col-3 mx-auto btn btn-primary" name="modoszitasok" value="1" >Módosítás</button>
    
</div>
        <center>
        <div>
            <?php
            ?>
        </div>
            </center>
</form>
</div>
</pre>