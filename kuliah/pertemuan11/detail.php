<?php
require 'function.php';

//ambil id dari url
$id = $_GET['id'];

//query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Informasi Secara Detail Mahasiswa</h3>

  <ul>
    <li><img src="gambar1/<?= $m['gambar'] ?>" width="70"></li>
    <li>NRP: <?= $m['nrp']; ?></li>
    <li>Nama: <?= $m['Nama']; ?> </li>
    <li>Email:<?= $m['email']; ?></li>
    <li>Jurusan: <?= $m['jurusan']; ?></li>
    <li><a href="ubah.php?id=<?= $m['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm('yakin mau dihapus?');">hapus</a></li>
    <li><a href="index.php">kembali ke halaman</a></li>
  </ul>

</body>

</html>