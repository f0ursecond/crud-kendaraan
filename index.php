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