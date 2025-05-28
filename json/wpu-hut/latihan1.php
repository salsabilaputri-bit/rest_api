<?php
$data = file_get_contents("data/pizza.json");
$menu = json_decode($data,true);

$menu = $menu["menu"];

// Tambahan: Filter kategori
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';

$filteredMenu = array_filter($menu, function($item) use ($kategori) {
    if ($kategori == 'semua') return true;
    return $item['kategori'] == $kategori;
});
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>WPU Hut</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="120">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?= $kategori == 'semua' ? 'active' : '' ?>" href="?kategori=semua">All Menu</a>
        <a class="nav-link <?= $kategori == 'pizza' ? 'active' : '' ?>" href="?kategori=pizza">Pizza</a>
        <a class="nav-link <?= $kategori == 'pasta' ? 'active' : '' ?>" href="?kategori=pasta">Pasta</a>
        <a class="nav-link <?= $kategori == 'nasi' ? 'active' : '' ?>" href="?kategori=nasi">Nasi</a>
        <a class="nav-link <?= $kategori == 'minuman' ? 'active' : '' ?>" href="?kategori=minuman">Minuman</a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row mt-3">
    <div class="col">
      <h1>All Menu</h1>
    </div>
  </div>

  <div class="row">
    <?php foreach($filteredMenu as $row) : ?>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="img/menu/<?= $row["gambar"];?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title"><?= $row["nama"]; ?> </h5>
          <p class="card-text"><?= $row["deskripsi"]; ?> </p>
          <h5 class="card-title"><?= $row["harga"]; ?> </h5>
          <a href="#" class="btn btn-primary">Pesan Sekarang</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" 
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
crossorigin="anonymous"></script>

  </body>
</html>
