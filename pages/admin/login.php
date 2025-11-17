<?php
session_start();
include '../../config/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>login admin</h2>
    <?php
    if(isset($_POST['login'])){
        $input = $_POST['username'];
        $password = $_POST['password'];

        //cek username atau email
        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            $query = "SELECT *FROM users WHERE email ='$input'";
        }
        else{
            $query = "SELECT *FROM users WHERE username ='$input'";
        }
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) >0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])) {

                //simpan session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
                $_SESSION['username'] = $row['username'];

                // arahan ke dashboard admin
                header("location: dashboard.php");
                exit();
            } else{
                echo "<p style='color:red' >password salah</p>";
            }

            }
            else{
                 echo "<p style='color:red' >username tidak ditemukan</p>";
            }
        }
        ?>
        <form method= "post" action="">
            <input type="teks" name="username" placeholder="masukkan username/password" required>

            <br><br>
            
            <label>password</label> <br>
            <input type="password" name="password" required>
            <br><br>
            <button type="submit" name="login">login</button>    
    </form>
</body>
</html>