<?php

$conn = mysqli_connect("localhost", "root", "", "latihan");

function addData($data)
{
  global $conn;

  $nama = htmlspecialchars($data["nama"]);
  $umur = htmlspecialchars($data["umur"]);
  $gambar = upload();

  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO knight VALUE ('', '$nama', '$umur', '$gambar')";
  mysqli_query($conn, $query);

  mysqli_affected_rows($conn);
}

function getData($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function updateData($data)
{
  global $conn;

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $umur = htmlspecialchars($data["umur"]);
  $gambar = upload();

  if (!$gambar) {
    return false;
  }

  $query = "UPDATE knight SET nama = '$nama', umur='$umur', gambar='$gambar' WHERE id = $id";
  mysqli_query($conn, $query);

  mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES["gambar"]["name"];
  $ukuranFile = $_FILES["gambar"]["size"];
  $tmpFile = $_FILES["gambar"]["tmp_name"];

  $eksFileValid = ["jpg", "jpeg", "png"];
  $eksFile = explode(".", $namaFile);
  $eksFile = strtolower(end($eksFile));

  if (!in_array($eksFile, $eksFileValid)) {
    echo "<script> alert('Image must be PNG/JPG/JPEG') </script>";
    return false;
  }

  if ($ukuranFile > 2000000) {
    echo "<script> alert('File size must under 2mb') </script>";
    return false;
  }

  move_uploaded_file($tmpFile, "src/img/$namaFile");

  return "src/img/$namaFile";
}


function deleteData($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM knight WHERE id = $id");
  mysqli_affected_rows($conn);
}

function addUSer($data)
{
  global $conn;

  $username = $data["username"];
  $password = $data["password"];
  $confirm = $data["confirm"];

  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script> alert('Username haas been Taken') </script>";
    return false;
  }

  if ($password !== $confirm) {
    echo "<script> alert('Invalid Password Confirm') </script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users VALUE ('', '$username', '$password')";
  mysqli_query($conn, $query);

  echo "<script> alert('Users has been Added :D');
  document.location.href = 'login.php';
  </script>";
}

function cariData($keyword)
{
  $query = "SELECT * FROM knight WHERE nama LIKE '%$keyword%'";
  return getData($query);
}
