<?php

require '../function.php';

$mahasiswa = cari($_GET['keyword']);
?>

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