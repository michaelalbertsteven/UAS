<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();

$error = '';
$validate = '';

//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
if( isset($_SESSION['username']) ) 
header('Location: home.php');

//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
        
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, $username);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($con, $password);
       
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){

            //select data berdasarkan username dari database
            $query      = "SELECT * FROM users WHERE username = '$username'";
            $result     = mysqli_query($con, $query);
            $rows       = mysqli_num_rows($result);

            if ($rows != 0) {
                $hash   = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;
               
                    header('Location: home.php');
                }
                            
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Register User Gagal !!';
            }
            
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
<style>
    body{
        margin : 0;
    }
    html {
        font-family: Arial; 
        display: inline-block;
        text-align: center;}
    .header{
        background-color: #F21616;
        color: white;
        overflow: hidden;
    }
    .content {padding: 5px; }
    .cards {max-width: 700px; margin: 0 auto; display: grid; grid-gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));}
    .card {background-color: white; box-shadow: 0px 0px 10px 1px rgba(230,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
    .card.header {background-color: #F21616; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}

    form .input-group input {
    margin-top: 1rem;
    width: 50%;
    height: 10%;
    padding: 1rem;
    font-size: 1rem;
    background: none;
    color: #8f8d8d;
    }

    form .btn {
    margin-top: 1rem;
    display: inline-block;
    padding: 1rem 1rem;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 10px;
    color: #8f8d8d;
    margin-bottom: 1rem;
    }

    .btn{
        border-radius: 5px;
        cursor: pointer;
        color: #8f8d8d;
        font-size: 1rem;
        padding: 0.5rem 0.5rem;
        border-radius: 10px;
        text-decoration: none;
    }
    
    .footer{
        cursor: pointer;
        color: #8f8d8d;
        font-size: 0.7rem;
        text-decoration: none;
    }

    @media (max-width:1366px) {
    html {
        font-size: 100%;
    }
    }

    @media (max-width:768px) {
        html {
            font-size: 75%;
        }
    }

    @media (max-width:450px){
    html {
        font-size: 55%;
    }
    }

</style>
</head>
<body>
    <div class="header"><h1>WELCOME TO LOGIN PAGE</h1></div>
    <br>
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="card header">
                <h3 style="font-size: 1rem;">Sign - In</h3>
                </div>

                <form action="login.php" method="POST">
                    <?php if($error != ''){ ?>
                        <div><?= $error; ?></div>
                    <?php } ?>
                    <div class="input-group">
                        <input type="text" id="username" name="username"  placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="password" placeholder="Password" id="password" name="password">
                        <?php if($validate != '') {?>
                            <p><?= $validate; ?></p>
                        <?php }?>
                    </div>

                    <button type="submit" class="btn" name="submit">Sign - In</button>
                </form>
                            
            </div>
        </div>
    </div>

    <div class="content">
        <div class="cards">
          <div class="card header" style="border-radius: 15px;">
              <h3 style="font-size: 0.7rem;">Belum punya akun?</h3>
              <a href="register.php"><button type="submit" class="btn">Register</button></a>
              <h3 style="font-size: 0.7rem;"><a href="admin.php" class="footer">Admin only !!</a></h3>
          </div>
        </div>
    </div>
</body>
</html>