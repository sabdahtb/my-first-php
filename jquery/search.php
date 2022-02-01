<?php

require "../functions.php";

$knights = cariData($_GET["keyword"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
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
</body>

</html>