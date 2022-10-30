<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png"></head>
<body>
    <div class="container-login">
        <div class="logo">
            <p>Wind Store</p>
        </div>
        <div class="form-login">
            <form action="" method="post">
                <label for=""><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" name="username" placeholder="Masukn Email atau Username" class="input" required>
                <label for=""><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" name="password" placeholder="Masukan Password" class="input" required>

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>

            <p class="regis">Belum punya akun? ->
                <a href="regis.php">Daftar?</a>
            </p>
        </div>
    </div>
</body>
</html>
<?php
    session_start();

    require 'koneksi.php';

    if(isset($_POST['login'])){
        $username  =  $_POST['username'];
        $password  =  $_POST['password'];
        $password  =  md5($password);

        $query  = "SELECT * FROM tb_user where username='$username' OR email='$username'";
        $result = $db->query($query);
        $row    = mysqli_fetch_array($result);
        $user   = $row['username'];

        if($password ==  $row['psw']){

            $_SESSION['login'] = true;
            
            echo "
                <script>
                    alert('Selamat Datang $user');
                    document.location.href = 'dashboard.php';
                </script>";
        }else{
            echo "
                <script>
                    alert('Username password salah');
                </script>";
        }

    }
?>

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
.container-login{
    max-width: 500px;
    margin: auto;
}

  input[type=text], input[type=password] {
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
.regis {
    margin-top:-21px;
    float:right;
}
.regis a{
    text-decoration:none;

}
</style>