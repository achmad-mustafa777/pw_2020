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
  $gambar = upload();

  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO mahasiswa 
            VALUES 
            (null,'$nama','$nrp','$email','$jurusan','$gambar' )";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}



function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $ukuran_file = $_FILES['gambar']['size'];
  $tipe_file = $_FILES['gambar']['type'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];



  //ketika tidak ada gambar dipilih
  if ($error == 4) {
    echo "<script>
          alert('pilih gambar terlebih dahuli');
          </script>";

    return false;
  }


  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
          alert('yang diupload bukan gambar/foto');
          </script>";

    return false;
  }

  //cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png' && $tipe_file != 'image/jpg') {
    echo "<script>
          alert('yang diupload bukan gambar/foto tapi script jahat');
          </script>";

    return false;
  }

  //cek ukuran file
  //maksimal 1mb = 1000000 byte
  if ($ukuran_file > 1000000) {
    echo "<script>
          alert('yang diupload terlalu besar ukurannya');
          </script>";

    return false;
  }

  //upload file
  //generate new name
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);


  return $nama_file_baru;
}



function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['Nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $email = htmlspecialchars($data['email']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE mahasiswa SET 
            Nama = '$nama',
            nrp = '$nrp',
            jurusan = '$jurusan',
            email = '$email',
            gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa WHERE  Nama LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = query("SELECT * FROM users WHERE username = '$username'")) {
    if (password_verify($password, $user['password'])) {
      //set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }

  return [
    'error' => true,
    'pesan' => 'Username / Password tidak benar / belum registrasi'
  ];
}


function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('username / password tidak boleh kosong');
          document.location.href = 'registrasi.php';
          </script>";

    return false;
  }

  if (query("SELECT * FROM users WHERE username = '$username'")) {
    echo "<script>
          alert('username sudah terdaftar di databases');
          document.location.href = 'registrasi.php';
          </script>";

    return false;
  }

  if ($password1 !== $password2) {
    echo "<script>
          alert('password tidak sesuai dengan konfirmasi');
          document.location.href = 'registrasi.php';
          </script>";

    return false;
  }

  if (strlen($password1) <= 3) {
    echo "<script>
          alert('minimal password 3 digit');
          document.location.href = 'registrasi.php';
          </script>";

    return false;
  }

  $passwordBaru = password_hash($password1, PASSWORD_DEFAULT);
  $query = "INSERT INTO users VALUES (null, '$username', '$passwordBaru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
