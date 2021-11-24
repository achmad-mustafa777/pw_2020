<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//ketika tombol cari diklik

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <a href="logout.php">Logout / ke jaba</a>
  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php">Tambah data!</a>
  <br><br>

  <form action="" method="POST">
<<<<<<< HEAD
    <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian" autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari!</button>
  </form>
  <br><br>

  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>

      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan="4">
            <p style="color:red; font-style:italic ">Data mahasiswa tidak ditemukan!!</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($mahasiswa as $rows) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><img src="gambar1/<?= $rows['gambar']; ?>" width="60"></td>
          <td><?= $rows['Nama']; ?></td>
          <td>
            <a href="detail.php?id=<?= $rows['id']; ?>">lihat detail</a>
          </td>
        </tr>

      <?php endforeach; ?>

    </table>
  </div>

  <script src="js/script.js"></script>
=======
    <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian" autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="4">
          <p style="color:red; font-style:italic ">Data mahasiswa tidak ditemukan!!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($mahasiswa as $rows) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="gambar1/<?= $rows['gambar']; ?>" width="60"></td>
        <td><?= $rows['Nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $rows['id']; ?>">lihat detail</a>
        </td>
      </tr>

    <?php endforeach; ?>

  </table>
>>>>>>> 4f943ff (memperbarui fitur Upload yang benar)
</body>

</html>