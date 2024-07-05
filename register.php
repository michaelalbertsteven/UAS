<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();

$error = '';
$validate = '';
if( isset($_SESSION['user']) ) header('Location: register.php');
//mengecek apakah data username yang diinpukan user kosong atau tidak
if( isset($_POST['submit']) ){
        
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, $username);
        $name     = stripslashes($_POST['name']);
        $name     = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($username,$con) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    //insert data ke database
                    $query = "INSERT INTO users (username,name,email, password, repassword ) VALUES ('$username','$name','$email','$pass', '$repass')";
                    $result   = mysqli_query($con, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        // $_SESSION['username'] = $username;
                       
                        // header('Location: register.php');
                        $validate = 'Register Berhasil !!';
                    
                    //jika gagal maka akan menampilkan pesan error
                    } 
                    else{
                        $error =  'Register User Gagal !!';
                        }
                }
                else{
                        $error =  'Username Sudah Terdaftar !!';
                    }
            }
            else{
                $validate = 'Password Tidak Sama !!';
                }
            
        }
        else{
            $error =  'Data Tidak Boleh Kosong !!';
            }
    } 

    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$con){
        $nama = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Register</title>
<style>
    body{
        margin : 0; 
    }
    html {
        font-family: Arial;   
        display: inline-block;  
        text-align: center;   
    }

    .background-img{
        background-image: url("background/supercar.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .header{
        overflow: hidden; 
        background-color: rgba(0,0,0,0.5); 
        color: white; 
        font-size: 1.2rem; 
        box-shadow: 0px 0px 10px 1px rgba(230,140,140,.5); 
        border: 1px solid #0c6980; 
    }
    .content {
        padding: 5px; 
    }
    .cards {
        max-width: 700px; 
        margin-top: 1rem; 
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
    .card.header {
        background-color: rgba(0, 0, 0, 0.5); 
        color: white; 
        border-bottom-right-radius: 0px; 
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
    margin-top: 0.5rem;
    display: inline-block;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 10px;
    color: #8f8d8d;
    margin-bottom: 0.5rem;
    }

    .btn{
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
}

    @media (max-width:450px){
    html {
        font-size: 55%;
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
<body class="background-img">
    <div class="header"><h1>WELCOME TO REGISTER PAGE</h1></div>
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="card header">
                <h3 style="font-size: 1rem;">Register</h3>
                </div>

                <form action="register.php" method="POST">
                    
                    <div class="input-group">
                    <?php if ($error != '') { ?>
                        <div id="popup" class="pesan">
                        <script type="text/javascript">showPopup();</script>
                            <p class="isi"> <?= $error; ?><!-- <button id="closeBtn" onclick="closePopup()">Close</button>--></p> 
                        </div>
                    <?php } ?> 
                    <?php if ($validate != '') { ?>
                        <div id="popup" class="pesan">
                        <script type="text/javascript">showPopup();</script>
                            <p class="isi"> <?= $validate; ?><!-- <button id="closeBtn" onclick="closePopup()">Close</button>--></p> 
                        </div>
                    <?php } ?>
                        <input type="text" id="name" name="name"  placeholder="Name">
                    </div>

                    <div class="input-group">
                        <input type="text" id="username" name="username"  placeholder="Username">
                    </div>
                    
                    <div class="input-group">
                        <input type="email" id="InputEmail" name="email"  placeholder="Email">
                    </div>

                    <div class="input-group">
                        <input type="password" placeholder="Password" id="InputPassword" name="password">
                    </div>

                    <div class="input-group">
                        <input type="password" placeholder="Re - Password" id="InputRePassword" name="repassword"> 
                    </div>
                    <button type="submit" class="btn" name="submit">Register</button>
                </form>
                            
            </div>
        </div>
    </div>

    <div class="content">
        <div class="cards">
          <div class="card header" style="border-radius: 15px;">
              <h3 style="font-size: 0.7rem;">Sudah punya akun?</h3>
              <a href="logout.php"><button type="submit" name="submit" class="btn">Login</button></a>
              <h3 style="font-size: 0.7rem;"></h3>
          </div>
        </div>
      </div>
</body>
</html>