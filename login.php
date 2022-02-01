<?php

session_start();
require "functions.php";

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  if ($key === hash('sha256', $row["username"])) {
    $_SESSION["login"] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {

      if (isset($_POST["check"])) {
        setcookie('id', $row["id"], time() + 300);
        setcookie('key', hash('sha256', $row["username"]), time() + 300);
      }

      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Knight</title>
  <link rel="stylesheet" href="src/css/style-dll.css">
  <style>
    .form {
      display: flex;
      justify-content: center;
    }

    .cb label {
      display: inline;
    }

    .cb input {
      width: 20px;
      margin: 20px 0;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="title">
      <h2>Log In with your Account</h2>
    </div>
    <div class="form">
      <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
        <div class="cb">
          <input type="checkbox" name="check" id="check">
          <label for="check">Remember Me</label>
        </div>
        <?php if (isset($error)) : ?>
          <div class="err" style="color: crimson;">
            <h4>Wrong Username or Password</h4>
          </div>
        <?php endif ?>
        <button name="login" class="add-btn">Log In</button>
      </form>
    </div>
  </div>

  <div class="back">
    <a href="register.php">Don't Have Account ? Sign In here</a>
  </div>
</body>

</html>