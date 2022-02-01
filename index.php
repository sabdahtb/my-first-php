<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "functions.php";

$knights = getData("SELECT * FROM knight");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Practice</title>
  <link rel="stylesheet" href="src/css/style-index.css">
  <style>
    .datas {
      padding: 30px 0;
    }

    .card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: white;
      border-radius: 5px;
      margin-bottom: 25px;
      transition: all 0.3s;
      transition-timing-function: ease-in;
    }

    .card button {
      margin-top: 20px;
      margin-right: 5px;
    }

    .card img {
      height: 100px;
      width: 100px;
      object-fit: cover;
      border-radius: 10px;
    }

    .card:hover {
      box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
    }

    .edit {
      background-color: orange;
    }

    .edit:hover {
      background-color: orangered;
    }

    .delete {
      background-color: rgb(224, 46, 82);
    }

    .delete:hover {
      background-color: rgb(202, 6, 46);
    }

    a {
      text-decoration: none;
    }

    .back {
      margin: 10px 60px;
      display: flex;
      justify-content: end;
    }

    .back a {
      font-weight: bold;
      text-decoration: none;
      color: #6e3cbc;
      font-style: italic;
      font-size: 16px;
    }

    .search {
      display: flex;
      justify-content: end;
      padding: 10px;
    }

    .search input {
      outline: none;
      border: 2px solid gray;
      border-radius: 4px;
      background: none;
      font-size: 16px;
      padding: 5px 10px;
      font-weight: bold;
      letter-spacing: 1px;
      color: rgb(71, 71, 71);
    }
  </style>
</head>

<body>

  <div class="back">
    <a href="logout.php" onclick="return confirm('Want to Log Out ?')">Log Out</a>
  </div>

  <div class="container">
    <div class="title">
      <h2>Welcome Clover's</h2>
    </div>

    <div class="search">
      <input type="text" name="keyword" id="keyword" placeholder="Search Knights...">
    </div>

    <div class="add">
      <a href="add.php">
        <button class="add-btn">ADD KNIGHT</button>
      </a>
    </div>

    <div class="datas">
      <?php foreach ($knights as $knight) : ?>
        <div class="card">
          <div class="kiri">
            <h3>Name : <?= $knight["nama"] ?></h3>
            <h3>Age : <?= $knight["umur"] ?></h3>
            <a href="edit.php?id=<?= $knight["id"] ?>">
              <button class="edit">Edit</button>
            </a>
            <a href="delete.php?id=<?= $knight["id"] ?>">
              <button class="delete" onclick="return confirm('sure want to delete it ?')">
                Delete
              </button>
            </a>
          </div>
          <div class="kanan">
            <img src="<?= $knight["gambar"] ?>" alt="" height="100px" width="100px">
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</body>

<script src="src/script/jquery-3.6.0.min.js"></script>
<script src="src/script/index.js"></script>

</html>