<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>Data Siswa</h1>
    <form action = "tampil_siswa.php" method = "POST">
        <input type = "text" name = "cari" class = "form-control" placeholder = "Masukkan Keyword Pencarian"/>
    </form>
    <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">ID Siswa</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Gender</th>
      <th scope="col">Alamat</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Kelas</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    if (isset($_POST["cari"])){
        //jika ada keyword pencarian
        $cari = $_POST['cari'];
        $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_siswa like '%$cari%' or siswa.nama_siswa like '%$cari%'");
    } else {
        //jika tidak ada keyword pencarian
        $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
    }
    while ($data_siswa = mysqli_fetch_array($query_siswa)){?>
        <tr> 
            <td><?php echo $data_siswa["id_siswa"];?></td>
            <td><?php echo $data_siswa["nama_siswa"];?></td>
            <td><?php echo $data_siswa["tanggal_lahir"];?></td>
            <td><?php echo $data_siswa["gender"];?></td>
            <td><?php echo $data_siswa["alamat"];?></td>
            <td><?php echo $data_siswa["username"];?></td>
            <td><?php echo $data_siswa["nama_kelas"];?></td>

            <td><a
            href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>"
            class="btn btn-success">Ubah</a> | <a
            href="hapus.php?id_siswa=<?=$data_siswa['id_siswa']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
            class=" btn-danger">Hapus</a>
            </td>

        </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>