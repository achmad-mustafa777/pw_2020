<?php
session_start();

if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

require 'function.php';

//ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
</head>

<body>
  <h3>Form Login Admin</h3>
  <?php if (isset($login['error'])) : ?>
    <p style="color: red; font-style:italic "><?= $login['pesan']; ?></p>
  <?php endif; ?>

  <form action="" method="post">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password :
          <input type="password" name="password" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
    </ul>
  </form>
  <br><br>
  <a href="registrasi.php">Registrasi / New User</a>

</body>

</html>