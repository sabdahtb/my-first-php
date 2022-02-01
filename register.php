<?php

require "functions.php";

if (isset($_POST["sign"])) {
  addUSer($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
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
      <h2>Sign In Page</h2>
    </div>
    <div class="form">
      <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
        <label for="confirm">Confirm Password :</label>
        <input type="password" name="confirm" id="confirm" required>
        <button name="sign" class="add-btn">Sign In</button>
      </form>
    </div>
  </div>

  <div class="back">
    <a href="login.php">Already have an Account ? Log In here</a>
  </div>

</body>

</html>