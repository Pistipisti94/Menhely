<pre>
<?php
$data = $db->kivalasztottAllat($id);
$allatneve = filter_input(INPUT_POST, "allatneve");
$faj = filter_input(INPUT_POST, "faj");
$fajta = filter_input(INPUT_POST, "fajta");
$szuletett = filter_input(INPUT_POST, "szuletett");
$neme = filter_input(INPUT_POST, "neme");
$nyilvantartas = filter_input(INPUT_POST, "nyilvantartas");
$megjegyzes = filter_input(INPUT_POST, "megjegyzes");

echo ' 
    <style>
    .kutakepe{
    width:20vw;
    height:30vw;
    
}    
</style>
    <div class="container">
    <div class="row">
    
    <img class="kutakepe mx-auto" src="./'."allatkepek/".$data['allat_neve'].'.png" alt="">
    </div>
    
    <form action="#" method="POST">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Állat neve:</label>
                    <input type="text" class="form-control" id="allatneve" name="allatneve" value="'.$data['allat_neve']. '">
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Faj:</label>
                    <input type="text" class="form-control" id="faj" name="faj" value="'.$data['faj']. '">
            </div>
        </div>
        <div class="row">
        <div class="col-2"></div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Fajta:</label>
                    <input type="text" class="form-control" id="fajta" name="fajta" value="'.$data['fajta']. '">
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Született:</label>
                    <input type="text" class="form-control" id="szuletett" name="szuletett" value="'.$data['szuletesi_ido']. '">
            </div>
        </div>
        <div class="row">
        <div class="col-2"></div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Neme:</label>
                    <input type="text" class="form-control" id="neme" name="neme" value="'.$data['nem']. '">
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Nyilvántartásba véve:</label>
                    <input type="text" class="form-control" id="nyilvantartas" name="nyilvantartas" value="'.$data['nyilvantartasban']. '">
            </div>
        </div>
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">Megjegyzés:</label>
                    <input type="text" class="form-control" id="megjegyzes" name="megjegyzes" value="'.$data['megjegyzes']. '">
            </div>
            <div class="row">
        <button onclick="update($allatneve,$faj,$fajta,$szuletett,$neme,$nyilvantartas,$megjegyzes) type="submit" class="col-3 mx-auto btn btn-primary" name="modoszitasok" value="true" >Módosítás</button>
    </div>
</form>
    

</div>


 ';


?>
</pre>