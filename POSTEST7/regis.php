<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <title>Register Form</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png"></head>
</head>
<body>
    <div class="container-regis" >

        <div class="judul">
            <h2>Registrasi</h2>
        </div>
        
        <div class="form" >

            <form  method="post"  autocomplete="off" enctype="multipart/form-data">
                <label for="nama"><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" name="username" class="input" placeholder="Username"  >

                <label for="username"><i class="fa-solid fa-envelope"></i> Email</label>
                <input type="email" name="email" class="input" placeholder="Email">

                <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" name="password" class="input" placeholder="Password">

                <label for="konfirmasi"><i class="fa-solid fa-lock"></i> Konfirmasi Password</label>
                <input type="password" name="konfirmasi" class="input" placeholder="Konfirmasi password">
                
                <label> <input type="checkbox" checked="checked" name="remember"> Bersedia Memenuhi Persyaratan? </label><br>
              
                <label for="">Profile Picture -> </label>
                <input type="file" required name="tampilan"><br>
                <input type="submit" name="registrasi" class="submit" value="Daftar "><br><br>
            </form>
            <p class="login" >Sudah punya akun? ->
                <a href="login.php">Login</a>
            </p>
        
        </div>
    </div>
</body>
</html>


<?php

    require 'koneksi.php';

    if(isset($_POST['registrasi'])){
        $username     = $_POST['username'];
        $password     = $_POST['password'];
        $email        = $_POST['email'];
        $konfirmasi   = $_POST['konfirmasi'];
    
        //Upload Gambar
        $gambar = $_FILES['tampilan']['name'];
        $gambar_baru = "$gambar";
        $tmp = $_FILES['tampilan']['tmp_name'];

        if(move_uploaded_file($tmp, 'tampilan/'.$gambar_baru)){
            $password  = md5($password);
            $query = "INSERT INTO tb_user ( username, psw, email, gambar)
                                  VALUES ('$username','$password','$email', '$gambar_baru')";
            $result = $db->query($query);

            if($result){
                header("Location:login.php");
            }else{

                echo "gagal kirim";
            }
        }
        
        if ($query)
        echo "<span class=berhasil>Data Barang Berhasil Di Tambah,<a href=about.php>Lihat Data</a></span>";
    }
?>


<script src="..\javascript\uncheck.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

body{
    font-family: 'Poppins', sans-serif;

}
.logo {
    text-decoration:line-through;
    font-size:22px;
    text-align: center;
    margin-bottom:55px;

}
.container-regis{
    max-width: 500px;
    margin: auto;
}


  input[type=text], input[type=password], input[type=email  ] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size:15px;

}

.submit {
  font-size:18px;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
.login {
    margin-top:-21px;
    float:right;
}
.login a{
    text-decoration:none;
}

.checkbox{
    cursor:pointer;
}
</style>