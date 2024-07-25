<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();
$error = '';
// $validate = '';
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
                $hash  = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;           
                    header('Location: home.php');
                }
                else {
                    $error = 'Sign-In User Gagal !!';
                }             
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Sign-In User Gagal !!';
            }
        }else {
            $error =  'Data Tidak Boleh Kosong !!';
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
        overflow: hidden;

    }
    html {
        font-family: Arial; 
        display: inline-block;
        text-align: center;
        overflow: hidden;
    }
    .header{
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        overflow: hidden;
        font-size: 1.2rem;
    }
    .content {
    padding: 5px;
    }

    .video-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1; /* Puts the video behind other content */
}

#bgVideo {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: 80%;
    height: auto;
    transform: translate(-50%, -50%);
    background-size: cover;
}

    .cards {
        max-width: 700px; 
        margin: 0 auto;
        display: grid; 
        grid-gap: 2rem; 
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
    .card {
        background-color: rgba(0, 0, 0, 0.5); 
        box-shadow: 0px 0px 10px 1px rgba(230,140,140,.5); 
        border: 1px solid #0c6980; 
        border-radius: 15px;
    }

    .card1{
        background-color: rgba(0, 0, 0, 0.5); 
        box-shadow: 0px 0px 10px 1px rgba(230,140,140,.5); 
        border: 1px solid #0c6980; 
    }

    .card.header {
        background-color: rgba(0, 0, 0, 0.5); 
        color: white; border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-top-right-radius: 12px; 
        border-top-left-radius: 12px;
    }

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

    .btn:hover{
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    .footer{
        cursor: pointer;
        color: #8f8d8d;
        font-size: 0.7rem;
        text-decoration: none;
    }

    .pesan{
        color: #fff;
        border-radius: 10px;
        margin-top:5px;
        margin-left: 10rem;
        margin-right: 10rem;
    }

    /* CSS for the pop-up */
    #popup {
            display: none; /* Hidden by default */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: #8f8d8d;

        }
        #popup .isi{
            border: 1px solid #f44336;
            border-radius: 10px;
        }
        /* CSS for the close button */
        #closeBtn {
            color: #8f8d8d;
            background-color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        #closeBtn:hover{
            background-color: #094c5d;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 10px;
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
        #bgVideo {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    transform: translate(-50%, -50%);
    background-size: cover;
}
    }

    @media (max-width:450px){
    html {
        font-size: 55%;
    }
    #bgVideo {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    transform: translate(-50%, -50%);
    background-size: cover;
}
    }
</style>
<script type="text/javascript">
        // JavaScript function to show the pop-up message
        function showPopup() {
            setTimeout(function() {
                document.getElementById('popup').style.display = 'block';
                setTimeout(closePopup,2000);
            },500);
            
        }
        // JavaScript function to hide the pop-up message
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="card1 header"><h1>WELCOME TO LOGIN PAGE</h1></div>

    <div class="video-background">
        <video autoplay muted loop id="bgVideo">
            <source src="background/userLogin.mp4" type="video/mp4">
        </video>
    </div>

    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="card header">
                <h3 style="font-size: 1rem;">Sign - In</h3>
                </div>
                <form action="index.php" method="POST">
                    <div class="input-group">
                        <?php if ($error != '') { ?>
                            <div id="popup" class="pesan">
                                <script type="text/javascript">showPopup();</script>
                                    <p class="isi"><?= $error; ?><!-- <button id="closeBtn" onclick="closePopup()">Close</button>--></p> 
                            </div>
                        <?php } ?>
                            <input type="text" id="username" name="username"  placeholder="Username">
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" id="password" name="password">
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
              <h3 style="font-size: 0.7rem;"><a href="admin.php" class="footer">ADMIN</a></h3>
          </div>
        </div>
    </div>
</body>
</html>