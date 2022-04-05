<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    h1 {
        background-color: #87d2d8;
        text-align: center;
        font-family: 'Rubik', sans-serif;
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

    table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        font-family: 'Rubik', sans-serif;
    }
</style>
<body>
    <h1>
        Web Pendataan Kehilangan Kendaraan Bermotor Roda 2 <br>
        Polrestabes Semarang
    </h1>

    <a href="index.php">
        + Tambah Data Baru
    </a>

    <p>
        Data Kendaraan
    </p>

    <table>
        <tr>
            <th>No.</th>
            <th>Jenis Kendaraan</th>
            <th>Merk / Type</th>
            <th>Warna Kendaraan</th>
            <th>Tahun Kendaraan</th>
            <th>Bahan Bakar</th>
            <th>Nomor Polisi</th>
            <th>Nomor Mesin</th>
            <th>Pemilik</th>
            <th>Alamat Pemilik</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no = 1;
            $ambildata = mysqli_query($conn, "select * from kendaraan");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                <tr>

                    <td>$no</td>
                    <td>$tampil[jeniskendaraan]</td>
                    <td>$tampil[merk]</td>
                    <td>$tampil[warna]</td>
                    <td>$tampil[tahun]</td>
                    <td>$tampil[bbm]</td>
                    <td>$tampil[nopol]</td>
                    <td>$tampil[norangka]</td>
                    <td>$tampil[nomesin]</td>
                    <td>$tampil[pemilik]</td>
                    <td>$tampil[alamat]</td>
                    <td><a href='?kode=$tampil[jeniskendaraan]'> Hapus </a></td>
                    <td><a href='edit.php?kode=$tampil[jeniskendaraan]'> Ubah </a></td>

                </tr>";

        $no++;
            }
        ?>

        
        
    </table>
    

    
    


</body>
</html>

<?php
    
?>