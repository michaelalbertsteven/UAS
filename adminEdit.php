<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title>
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
    padding: 0.5rem 0.5rem;
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

    .label{
        text-align: left;
        margin-left: 10rem;
        margin-top: 1rem;
        color: white;
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

<body class="background-img">
    <div class="header"><h1>WELCOME TO EDIT PAGE</h1></div>
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($con,"SELECT * FROM adminuser WHERE id = '$id'");
    while($d = mysqli_fetch_array($data)){
        ?>
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="card header">
                <h3 style="font-size: 1rem;">Edit Data</h3>
                </div>

                <form action="adminUpdate.php" method="POST">
                    
                     
                    <div class="input-group">
                        <div class="label"><label for="name">Nama</label></div>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" id="name" name="name"  placeholder="Name" value="<?php echo $d['name']; ?>">
                    </div>

                    <div class="input-group">
                        <div class="label"><label for="username">Username</label></div>
                        <input type="text" id="username" name="username"  placeholder="Username" value="<?php echo $d['username']; ?>">
                    </div>
                    
                    <div class="input-group">
                        <div class="label"><label for="email">Email</label></div>
                        <input type="email" id="InputEmail" name="email"  placeholder="Email" value="<?php echo $d['email']; ?>">
                    </div>

                    <div class="input-group">
                        <div class="label"><label for="password">Password</label></div>
                        <input type="password" placeholder="Password" id="InputPassword" name="password" value="<?php echo $d['repassword']; ?>">
                    </div>

                    <div class="input-group">
                        <div class="label"><label for="repassword">Re - Password</label></div>
                        <input type="password" placeholder="Re - Password" id="InputRePassword" name="repassword" value="<?php echo $d['repassword']; ?>"> 
                    </div>
                    <button type="submit" class="btn" name="submit">Save</button>
                </form>
                <?php
    }
    ?>
                            
            </div>
        </div>
    </div>

    <div class="content">
        <div class="cards">
          <div class="card header" style="border-radius: 15px;">
              <h3 style="font-size: 0.7rem;">Kembali ke admin list !!</h3>
              <a href="adminList.php"><button type="submit" name="submit" class="btn">Back</button></a>
              <h3 style="font-size: 0.7rem;"></h3>
          </div>
        </div>
      </div>
</body>
</html>