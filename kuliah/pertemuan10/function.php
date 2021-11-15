<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '123', 'phpdasar');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  //jika data yang diambil cuman 1
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  };

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['Nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $email = htmlspecialchars($data['email']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO mahasiswa 
            VALUES 
            (null,'$nama','$nrp','$email','$jurusan','$gambar' )";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}
