<?php
  //  require "sesion.php";
    require "koneksi.php";

    $tid = $_GET['q']; //checking id

    $query =mysqli_query($conn, "SELECT * FROM kategori WHERE id ='$tid'");
    $data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nefi Electronic Official Store/ Kategori/ Category Details</title>

    <!-- link style -->
    <link rel="stylesheet" href="detail.css">

</head>
<body>

    <section id="detail-kategori">
        <h2>Details of the Category</h2>
        <div>
            <form action="" method="post">
                <div class="placeholder">
                    <label for="kategori">Category</label>
                </div>
                <div class="isi">
                    <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama'];?>">
                    <button class="btn-edit" type="submit" name="editbtn">Edit</button>
                    <button class="btn-delete" type="submit" name="deletebtn">Delete</button>
                </div>
            </form>
            <?php
                if(isset($_POST['editbtn'])){
                    $det_kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama']==$det_kategori){
                        ?>    
                            <meta http-equiv="refresh" content="0; url=kategori.php" />
                        <?php
                    }else{
                        $query = mysqli_query($conn, "SELECT * FROM kategori WHERE nama='$det_kategori'");
                        $jumlahData =mysqli_num_rows($query);
                        
                        if($jumlahData>0){
                            ?>
                                <div class="alert-Failed">
                                    The Category is already Exist!!
                                </div>
                            <?php
                        }else{
                            $querySimpan = mysqli_query($conn, "UPDATE kategori SET nama='$det_kategori' WHERE id='$tid'");
                            if($querySimpan){
                            ?>
                                <div class="alert-sukses" role="alert">
                                    The Category is successfully Updated!!
                                </div>
                            <meta http-equiv="refresh" content="2; url=kategori.php" /> <!-- 2 detik, url tujuan simpan -->
                            <?php
                            }
                            else{ 
                                echo mysqli_error($conn);
                            }

                        }
                    }
                }
                
                /*<!--dari nama button-->*/
                if(isset($_POST['deletebtn'])) {
                    $queryDelete = mysqli_query($conn, "DELETE FROM kategori WHERE id='$tid'");
                    if($queryDelete){
                        ?>
                            <div class="alert-sukses" role="alert">
                                 The Category is successfully Deleted!!
                            </div>

                            <meta http-equiv="refresh" content="2; url=kategori.php" />

                        <?php
                    }else{
                        echo mysqli_error($conn);
                    }
                }

            ?>
        </div>
    </section>
</body>
</html>