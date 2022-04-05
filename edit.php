<?php
include "koneksi.php";
    $sql = mysqli_query($conn, "select * from kendaraan where jeniskendaraan='$_GET[kode]'");
    $data = mysqli_fetch_array($sql);
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
        Ubah

    </h1>

    <a href="tampil.php">
        < Lihat Semua Data
    </a>

    <p >Ubah Kendaraan Baru</p>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Jenis Kendaraan</td>
                <td><input type="text" name="jeniskendaraan" 
                value="<?php echo $data['jeniskendaraan']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Merk / type</td>
                <td><input type="text" name="merk"
                value="<?php echo $data['merk']; ?>"
                
                    ></td>
            </tr>
            <tr>
                <td>Warna Kendaraan</td>
                <td><input type="text" name="warna"
                value="<?php echo $data['warna']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Tahun Pembuatan</td>
                <td><input type="date" name="tahun"
                value="<?php echo $data['tahun']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Bahan Bakar</td>
                <td><input type="text" name="bbm"
                value="<?php echo $data['bbm']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Nomor Polisi</td>
                <td><input type="text" name="nopol"
                value="<?php echo $data['nopol']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Nomor Rangka</td>
                <td><input type="text" name="norangka"
                value="<?php echo $data['norangka']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Nomor Mesin</td>
                <td><input type="text" name="nomesin"
                value="<?php echo $data['nomesin']; ?>"
                    ></td>
            </tr>
            <tr> 
                <td>Pemilik</td>
                <td><input type="text" name="pemilik"
                value="<?php echo $data['pemilik']; ?>"
                    ></td>
            </tr>
            <tr>
                <td>Alamat Pemilik</td>
                <td><textarea name="alamat" id="" cols="21" rows="5" 
                
                ></textarea></td>
            </tr>
            <tr>
                <td></td>
            <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    <?php
        include "koneksi.php";

        if (isset($_POST['submit'])) {
            mysqli_query($conn, "update kendaraan set nopol='$_POST[nopol]', jeniskendaraan = '$_POST[jeniskendaraan]',
                        merk = '$_POST[merk]' , warna = '$_POST[warna]', tahun = '$_POST[tahun]', bbm = '$_POST[bbm]',
                        norangka = '$_POST[norangka]', nomesin = '$_POST[nomesin]', pemilik = '$_POST[pemilik]', alamat = '$_POST[alamat]' 
                        where jeniskendaraan = '$_GET[kode]'");
            
                        echo "Data kendaraan telah diubah";
                        echo "<meta http-equiv=refresh content=1;URL='tampil.php'>";
        }
    ?>
</body>
</html>