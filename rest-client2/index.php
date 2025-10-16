<?php
//load config.php
include("config/config.php");
 
//untuk api_key newsapi.org
$api_key="477a055429ec4aeab79b3f17c87bfe0c";
 
//url api untuk ambil berita headline di Indonesia
$url="https://newsapi.org/v2/top-headlines?country=us&apiKey=".$api_key;
 
//menyimpan hasil dalam variabel
$data=http_request_get($url);
 
//konversi data json ke array
$hasil=json_decode($data,true);
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rest Client</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
<head>
    <title>Rest Client</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Warna Latar Belakang abu-abu */
        .navbar-custom {
            background-color: #767c7cff !important; /* Warna Teal gelap */
        }

        /* Memastikan teks tetap putih/terang */
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white !important;
        }
        
        /* Ikon Home terlihat lebih jelas */
        .navbar-custom .nav-link i {
            margin-right: 5px;
        }
    </style>
<body>
 
<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
  <div class="container"> 
    
    <a class="navbar-brand" href="#">
        <i class="fas fa-newspaper"></i> Rest Client
        </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-home"></i> Home
            </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
    </div>
    
  </div> </nav>
<!-- navbar -->
<div class="container" style="margin-top: 75px;">
    <div class="row">
 
<!-- looping hasil data di array article -->
<?php foreach ($hasil['articles'] as $row) { ?>
 
        <div class="col-md" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="card" style="width: 18rem;">
              <img src="<?php echo $row['urlToImage']; ?>" class="card-img-top" height="180px">
              <div class="card-body">
                <p class="card-text"><i>Oleh <?php echo $row['author']; ?></i> ~ <?php echo $row['title']; ?></p>
                <p class="text-right"><a href="<?php echo $row['urlToImage']; ?>" target="_blank">Selengkapnya..</a></p>
              </div>
            </div>
        </div>
 
<?php } ?>
 
    </div>
</div>
 
<!-- JS Bootstrap -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>