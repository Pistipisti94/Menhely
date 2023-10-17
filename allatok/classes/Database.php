<?php

class Database {

    private $db = null;

    public function __construct($host, $username, $pass, $db) {
        $this->db = new mysqli($host, $username, $pass, $db);
        $this->db->set_charset("utf8mb4");
    }

    public function login($name, $pass) {
        //-- jelezzük a végrehajtandó SQL parancsot
        $stmt = $this->db->prepare('SELECT * FROM users WHERE users.user LIKE ?;');
        //-- elküldjük a végrehajtáshoz szükséges adatokat
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            //-- Sikeres végrehajtás után lekérjül az adatokat
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass == $row['password']) {
                //-- felhasználónév és jelszó helyes
                $_SESSION['username'] = $row['name'];
                $_SESSION['login'] = true;
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }

            // Free result set
            $result->free_result();
            header("Location: index.php");
        }
        return false;
    }

    public function register($igazolvanyszam, $fullname, $mail, $name, $pass1) {
        //$password = password_hash($pass, PASSWORD_ARGON2ID);
        echo 'Eddig jó';
        $stmt = $this->db->prepare("INSERT INTO `users` (`userid`, `igazolvanyszam`, `orokbefogado_neve`, `emailcim`, `user`, `password`) VALUES (NULL, ?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $igazolvanyszam, $fullname, $mail, $name, $pass1);
        if ($stmt->execute()) {
            $_SESSION['login'] = true;
            header("Location: index.php");
        }
    }

    public function update($allatid, $allatneve, $faj, $fajta, $szuletett, $neme, $nyilvantartas, $megjegyzes) {
        $sql = "UPDATE `allat` SET `allatid` = '". $allatid ."', `allat_neve`='" . $allatneve . "',`faj`='" . $faj . "',`fajta`='" . $fajta . "',`szuletesi_ido`='" . $szuletett . "',`nem`='" . $neme . "',`megjegyzes`='" . $megjegyzes . "',`nyilvantartasban`='" . $nyilvantartas . "'";
        if ($this->db->query($sql) === TRUE) {
            echo "Record updated successfully";
            return $sql;
        } else {
            echo "Error updating record: " . $this->db->error;
        }
    }

    public function osszesAllat() {
        $result = $this->db->query("SELECT * FROM `allat`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function kivalasztottAllat($id) {
        $result = $this->db->query("SELECT * FROM `allat`WHERE allatid=" . $id);
        return $result->fetch_assoc();
    }

    public function getFajok() {
        $result = $this->db->query("SELECT DISTINCT `faj` FROM `allat` WHERE 1;");
        return $result->fetch_all();
    }

    public function getFajtak() {
        $result = $this->db->query("SELECT DISTINCT `fajta` FROM `allat` WHERE 1;");
        return $result->fetch_all();
    }
}
