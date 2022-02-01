<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "functions.php";

$id = $_GET["id"];
deleteData($id);

if (mysqli_affected_rows($conn) > 0) {
  echo "<script> alert('Data deleted successfully :D');
    document.location.href = 'index.php';
    </script>";
} else {
  echo "<script> alert('Fail to delete Data :((') </script>";
}
