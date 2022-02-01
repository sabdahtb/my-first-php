<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "functions.php";

if (isset($_POST["add"])) {
  addData($_POST);

  if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Data added successfully :D');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script> alert('Fail to add Data :((') </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Knights</title>
  <link rel="stylesheet" href="src/css/style-dll.css">
</head>

<body>
  <div class="container">
    <div class="title">
      <h2>Add a Clover Knight</h2>
    </div>
    <div class="form">
      <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama(Name) :</label>
        <input type="text" name="nama" id="nama" required>
        <label for="umur">Umur(Age) :</label>
        <input type="number" name="umur" id="umur" required>
        <label for="gambar">Gambar(Image) :</label>
        <input type="file" name="gambar" id="gambar" required>
        <button name="add" class="add-btn">Add Knight</button>
      </form>
    </div>
  </div>
  <div class="back">
    <a href="index.php">&laquo; Back to HomePage</a>
  </div>
</body>

</html>