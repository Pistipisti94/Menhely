<?php
if (filter_input(INPUT_POST, 'regisztraciosAdatok', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $igazolvanyszam = filter_input(INPUT_POST, "Igszam");
    $fullname = filter_input(INPUT_POST, "teljesnev");
    $pass1 = filter_input(INPUT_POST, "InputPassword");
    $pass2 = filter_input(INPUT_POST, "InputPassword2");
    $name = htmlspecialchars(filter_input(INPUT_POST, 'username'));
    $mail = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $error = true; //-- validációnál találtunk-e hibát?
    //-- adatok validálása ----
    if ($pass1 == $pass2) {
        $error = false;
    } else {
        $error = true;
        echo 'A jelszavak nem eggyeznek.';
    }


    if (!$error) {
        //--Regisztráció indítása, mert nincs hiba a bejövő adatokban
        $db->register($igazolvanyszam, $fullname, $mail, $name, $pass1);
        header("Location:index.php"); //Átváltás a nyitólapra
    }
}
?>
<div class="container">
    <form action="#" method="post">
        <div class="row">
            <div class="col-1"></div>
            <div class="mb-3 col-5">
                <label for="exampleInputEmail1" class="form-label">Teljes neve:</label>
                <input type="text" class="form-control" id="teljesnev" name="teljesnev" aria-describedby="emailHelp" required min="3">

            </div>
            <div class="mb-3 col-5">
                <label for="exampleInputEmail1" class="form-label">E-mail címe:</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="mb-3 col-4">
                <label for="exampleInputEmail1" class="form-label">Felhasználónév</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required min="3">

            </div>
            <div class="mb-3 col-4">
                <label for="exampleInputEmail1" class="form-label">Igazolványszám:</label>
                <input type="text" class="form-control" id="Igszam" name="Igszam" aria-describedby="emailHelp" required pattern="[1-9]{1}[0-9]{5}[A-Za-z]{2}" min="8" max="8">

            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="mb-3 col-3">
                <label for="InputPassword" class="form-label">Jelszó</label>
                <input type="password" class="form-control" id="InputPassword" name="InputPassword" required>
            </div>
            <div class="mb-3 col-3">
                <label for="InputPassword2" class="form-label">Jelszó megerősítés</label>
                <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" required>
            </div>
            
        </div>
        <div class="row">
        <button type="submit" class="col-2 btn btn-primary mx-auto" name="regisztraciosAdatok" value="true" >Regisztráció</button>
        </div>
    </form>

</div>
