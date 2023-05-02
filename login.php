<?php
    session_start();
    require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN </title>
    
<!-- link style -->
<link rel="stylesheet" href="mystyle.css">
<link rel="stylesheet" href="log.css">
<!-- link awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >

</head>
<body>

    <section id="form-login">
        <div class="container">
            <div class="header-form">
                <header>Login</header>
            </div>
            <div class="field">
                <form action="" method= POST name="input">
                    <div class="inputan"> 
                        <i class="fa-solid fa-user"></i></a></li>
                        <input type="text" class="input" placeholder="Enter Your Username"  name="user_name" id="user_name" required> 
                        
                    </div>
                    <div class="inputan">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" class="input" placeholder="Enter Your Password"  name="sandi" id="sandi" required> 
                        
                    </div>
                    <div class="button">
                        <input type="submit" class="submit" value="login" name="log-in">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="hasil">
        <?php
            if(isset($_POST['log-in'])){
                $tusername = htmlspecialchars($_POST['user_name']);//special chars biar user g ngetik yg aneh2
                $tpassword = htmlspecialchars($_POST['sandi']);
            
                $sql = "SELECT * from user  where username ='$tusername' and password ='$tpassword'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);

                if($count==1){
                    header('Location:index.php');
                }else{
                    echo '<script>
                        window.location.href = "login.php";
                        alert("Login failed. Invalid username or password !!")
                        </script>';
                }
            }
        ?>
    </div>

</body>
</html>
