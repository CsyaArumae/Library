<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class= "container" >
        <table class="table">
        <h1>Tabel Kelas</h1>
        <h6>Pencarian</h6>
        <form action = " tampil_kelas.php" method = "POST">
            <input type="text" name="cari" class="form-control"
            placeholder = "Masukkan Kelas"/>
        </form>
            <thead>
                <tr>
                    <th scope="col">ID Kelas</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Kelompok</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                     include "koneksi.php";
                     if (isset ($_POST ["cari"])){
                         //jika ada keyword pencarian
                         $cari = $_POST ['cari'];
                         $qry_kelas=mysqli_query($koneksi,
                        "select * from kelas where id_kelas like '%$cari%' or nama_kelas like '%$cari%'");
                     }
                     else {
                         //jika tidak ada keyword pencarian
                         $qry_kelas=mysqli_query($koneksi, "select * from kelas");
                     }
                     while ($data_kelas = mysqli_fetch_array($qry_kelas)){?>
                     <tr>
                         <td><?php echo $data_kelas ["id_kelas"]; ?></td>
                         <td><?php echo $data_kelas ["nama_kelas"]; ?></td>
                         <td><?php echo $data_kelas ["kelompok"]; ?></td>
                     </tr>
                     <?php
                     }
                 ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  
</body>
</html>