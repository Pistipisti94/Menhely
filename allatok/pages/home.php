<div class="container">
    <div class="row">
        <?php
        foreach ($db->osszesAllat() as $row) {
            $image = null;
            if (file_exists("./allatkepek/" . $row['allat_neve'] . ".jpg")) {
                $image = "./allatkepek/" . $row['allat_neve'] . ".jpg";
            } else if (file_exists("./allatkepek/" . $row['allat_neve'] . ".jpeg")) {
                $image = "./allatkepek/" . $row['allat_neve'] . ".jpeg";
            } else if (file_exists("./allatkepek/" . $row['allat_neve'] . ".png")) {
                $image = "./allatkepek/" . $row['allat_neve'] . ".png";
            } else {
                $image = "./items/noImages.png";
            }
            $card = '
            <div class="card m-2 col-3" style="width: 18rem;">
                <img class="card-img-top" src="' . $image . '" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">' . $row['allat_neve'] . '</h5>
                    <p class="card-text">Leírás:<hr>született: ' . $row['szuletesi_ido'] . '<br> neme: ' . $row['nem'] . '<br> Fajtája: ' . $row['fajta'] . '<br> Nyilvantartásban: ' . $row['nyilvantartasban'] . '<br> Megjegyzés:' . $row['megjegyzes'] . ' </p>
                    <a href="index.php?menu=home&id=' . $row['allatid'] . '" class="btn btn-primary">Kiválasztás</a> 
                </div>
            </div>';
            echo $card;
        }
        ?>  
    </div>
</div>





