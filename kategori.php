<?php
  //  require "sesion.php";
    require "koneksi.php";
    
    $queryKategori = mysqli_query($conn, 'SELECT * FROM kategori');
    $jumlahKategori =mysqli_num_rows($queryKategori);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nefi Electronic Official Store/ Kategori</title>
<!-- link style -->
<link rel="stylesheet" href="styleadmin.css">
<!-- link awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>

    <!-- UNTUK HEADER/NAVIGASI -->

    <section id="header">
        <a href="#"><img src="allimg/logo.png" class="logo" alt="" width="150px"></a>
        
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="kategori.php">Categories</a></li>
                <li><a href="produk.php">Products</a></li>
                <li><a href="datamember.php">Membership</a></li>
                <li><a href="databisnis.php">Bussiness</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
    </section>

    <!-- 
    <section id="video">
        <video width="900"controls>
            <video src="dolby_polytron_1.mp4" type="video/mp4"></video>
        </video>
    </section>
     -->
    <section id="tambah">
        <h2>Add Category</h2>
        <form action="" method="post">
            <div class="placeholder">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" placeholder="Input the Name of Category">
                <button class="btn-tambah" type="submit" name="save">Save</button>
            </div>
        </form>

        <?php
        if(isset($_POST['save'])){
            $tkategori =($_POST['kategori']);

            $queryExist = mysqli_query($conn, "SELECT nama FROM kategori WHERE nama ='$tkategori' ");//unutk pengecekan kalo kategorinya sama ga bisa di add
            $jmlhKategoriBaru = mysqli_num_rows($queryExist);

            if($jmlhKategoriBaru > 0){
            ?>
                <div class="alert-Failed">
                    The Category is already Exist!!
                </div>
            <?php
            }else{
                $querySimpan = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$tkategori')");
                if($querySimpan){
                ?>
                    <div class="alert-sukses">
                    The Category is successfully added!!
                </div>
                <meta http-equiv="refresh" content="2; url=kategori.php" /> <!-- 2 detik, url tujuan simpan -->
                <?php
                }
                else{ 
                    echo mysqli_error($conn);
                }
            }
        }
        ?>
    </section>


    <section id="categories" class="section-p1">
         <h2>List of Categories</h2>
         <div class="tabelKategori">
            <table class="content">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($jumlahKategori==0){
                    ?>
                        <tr>
                            <td>The Data of the Categories is not Available</td>
                        </tr>
                    <?php
                        }
                        else{
                            $jumlah = 1;
                            while($data = mysqli_fetch_array($queryKategori)){ //data2 dari database ditampung disini
                    ?>
                        <tr>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data ['nama']; ?></td>
                            <td>
                    <!--  .php?q= q untuk penyamaran id-->
                                <a href="detail-kategori.php?q=<?php echo $data['id'];?>" class="kategori-detail"><i class= "fas fa-search"></i></a>
                            </td>
                        </tr>  
                    <?php
                            $jumlah++;
                            }
                        }
                    ?>
                </tbody>
            </table>
         </div>
    </section>


    <!-- banner bawah -->
    <section id="news" class="section-p1 section-m1">
        <div class="text">
            <h3>The Important Thing is Your Necessary</h4>
            <p>Get All of What You Want Here adn Don't forget to take the <span>special offers.</span></p>
        </div>
    </section>
</body>
</html>