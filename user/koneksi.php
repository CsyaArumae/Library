<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "perpus";

    $koneksi = mysqli_connect($serverName, $userName, $password, $database);

   //if(!$koneksi){
   //    die("Koneksi Gagal".mysqli_connect_error());
   // }
   //else{
   //    echo "Koneksi Berhasil";
   // }
?>