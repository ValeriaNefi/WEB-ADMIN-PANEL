<?php
  //  require "sesion.php";
    require "koneksi.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nefi Elektronik Official Online Store</title>

<!-- link boo -->
<link rel="stylesheet" href="mystyle.css">
<link rel="stylesheet" href="styleadmin.css">
<!-- link awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >

</head>

<body>
    <section id="header">
        <a href="#"><img src="allimg/logo.png" class="logo" alt="" width="150px"></a>
        
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="kategori.php">Categories</a></li>
                <li><a href="produk.php">Products</a></li>
                <li><a href="datamember.php">Membership</a></li>
                <li><a href="databisnis.php">Bussiness</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
    </section>
    <section id="beranda">
        <h3>The <b>First</b> Electronic Store in Indonesia</h3>
        <h2>Always Provide Your Necessary</h2>
    </section>

    <section id="box" class="section-p1">
        <div class="box1">
            <div class="icon">
                <i class="fas fa-align-justify fa-6x"></i>
            </div>
            <div class="ket">
                <h3>Kategori</h3>
                <p><?php echo $jumlahKategori; ?> Kategori</p>
                <p><a href="kategori.php">Lihat Detail</a></p>
                
            </div>
        </div>
        <div class="box2">
            <div class="icon">
            <i class="fas fa-box fa-6x"></i>
            </div>
            <div class="ket">
                <h3>Produk</h3>
                <p><?php echo $jumlahProduk; ?> Produk</p>
                <p><a href="produk.php">Lihat Detail</a></p>
            </div>
        </div>
    </section>

    

    <!-- banner bawah -->
    <section id="news" class="section-p1">
        <div class="text">
            <h3>The Important Thing is Your Necessary</h4>
            <p>Get All of What You Want Here and Don't Forget to Take The <span>special offers.</span></p>
        </div>
       <!--  <div class="form">
            <input type="text" placeholder="Your e-mail address">
            <button class="sign">Sign Up</button>
        </div> -->

    
</body>
</html>