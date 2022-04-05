<?php
    if (isset($_POST['submit'])){
        if (isset($_POST['jeniskendaraan']) && isset($_POST['merk']) && isset($_POST['warna']) && 
        isset($_POST['tahun']) && isset($_POST['bbm']) && isset($_POST['nopol']) && isset($_POST['norangka']) && 
        isset($_POST['nomesin']) && isset($_POST['pemilik']) && isset($_POST['alamat'])) {

            $jeniskendaraan = $_POST['jeniskendaraan'];
            $merk = $_POST['merk'];
            $warna = $_POST['warna'];
            $tahun = $_POST['tahun'];
            $bbm = $_POST['bbm'];
            $nopol = $_POST['nopol'];
            $norangka = $_POST['norangka'];
            $nomesin = $_POST['nomesin'];
            $pemilik = $_POST['pemilik'];
            $alamat = $_POST['alamat'];

            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "crud1";

            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if($conn -> connect_error) {
                die('Tidak dapat terkoneksi ke database');
            } else {
                $Select = "SELECT nopol FROM kendaraan WHERE nopol = ? LIMIT 1";
                $Insert = "INSERT INTO kendaraan (jeniskendaraan, merk , warna , tahun , bbm , nopol , norangka
                    , nomesin , pemilik , alamat) values (?,?,?,?,?,?,?,?,?,?)";

                $stmt = $conn -> prepare($Select);
                $stmt -> bind_param("s", $nopol);
                $stmt -> execute();
                $stmt -> bind_result($resultNopol);
                $stmt -> store_result();
                $stmt -> fetch();
                $rnum = $stmt -> num_rows();

                if($rnum == 0) {
                    $stmt -> close();
                    $stmt = $conn -> prepare($Insert);
                    $stmt -> bind_param("sssdssssss",$jeniskendaraan, $merk , $warna , $tahun , $bbm , 
                                        $nopol, $norangka , $nomesin , $pemilik , $alamat);
                    if ($stmt -> execute()) {
                        echo "New Record Inserted Sucessfully.";
                        header("Location: tampil.php");
                    } else {
                        echo $stmt -> error;
                    }
                }
                else {
                    echo "Nomor Polisi sudah digunakan";
                }
                $stmt -> close();
                $conn -> close();
            }

        } 
        else {
            echo "all field are req";
            die();
        }

    } else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1 {
        background-color: #87d2d8;
        text-align: center;
    }

    body {
        background-color: #01ff00;
    }

    p {
        font-weight: bold;
    }

    input {
        padding-left: 5px;
    }

    label {
        padding-left: 10;
    }
</style>
<body>
    <h1>
        Web Pendataan Kehilangan Kendaraan Bermotor Roda 2 <br>
        Polrestabes Semarang

    </h1>

    <a href="tampil.php">
        < Lihat Semua Data
    </a>

    <p >Input Kendaraan Baru</p>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Jenis Kendaraan</td>
                <td><input type="text" name="jeniskendaraan" 
                    ></td>
            </tr>
            <tr>
                <td>Merk / type</td>
                <td><input type="text" name="merk" 
                    ></td>
            </tr>
            <tr>
                <td>Warna Kendaraan</td>
                <td><input type="text" name="warna"
                    ></td>
            </tr>
            <tr>
                <td>Tahun Pembuatan</td>
                <td><input type="number" name="tahun"
                    ></td>
            </tr>
            <tr>
                <td>Bahan Bakar</td>
                <td><input type="text" name="bbm"
                    ></td>
            </tr>
            <tr>
                <td>Nomor Polisi</td>
                <td><input type="text" name="nopol"
                    ></td>
            </tr>
            <tr>
                <td>Nomor Rangka</td>
                <td><input type="text" name="norangka"
                    ></td>
            </tr>
            <tr>
                <td>Nomor Mesin</td>
                <td><input type="text" name="nomesin"
                    ></td>
            </tr>
            <tr> 
                <td>Pemilik</td>
                <td><input type="text" name="pemilik"
                    ></td>
            </tr>
            <tr>
                <td>Alamat Pemilik</td>
                <td><textarea name="alamat" id="" cols="21" rows="5"></textarea></td>
            </tr>
            <tr>
                <td></td>
            <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    


</body>
</html>

