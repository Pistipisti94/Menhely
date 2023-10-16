<?php
if (filter_input(INPUT_POST, 'regisztraciosAdatok', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $pass1 = filter_input(INPUT_POST, "InputPassword");
    $pass2 = filter_input(INPUT_POST, "InputPassword2");
    $name = htmlspecialchars(filter_input(INPUT_POST, 'username'));
    echo 'eddig jó';
    if ($pass1 == $pass2) {
        //--Regisztráció indítása
        $db->register($name, $pass1);
        header("Location:index.php"); //Átváltás a nyitólapra
    } else {
        echo '<p>A jelszavak nem egyeznek</p>';
    }
}
?>
<div class="container">
    <form action="#" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Felhasználónév</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="InputPassword" name="InputPassword">
        </div>
        <div class="mb-3">
            <label for="InputPassword2" class="form-label">Jelszó megerősítés</label>
            <input type="password" class="form-control" id="InputPassword2" name="InputPassword2">
        </div>

        <button type="submit" class="btn btn-primary" name="regisztraciosAdatok" value="true" >Regisztráció</button>
    </form>

</div>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2">
            <input type="submit" value="Előző" name="Előző" disabled="disabled"/>
        </div>
        <div class="col-2">
            <p id="pagetxt">1/2</p>
        </div>
        <div class="col-2">
            <input type="submit" value="Következő" name="Következő"/>
        </div>
        <div class="col-3"></div>
        <hr>
    </div>

</div>