<?php
require 'koneksi.php';

if(isset($_POST["register"])){
    $fullname = htmlspecialchars ($_POST["fullname"]);
    $username = htmlspecialchars ($_POST["username"]);
    $email = htmlspecialchars ($_POST["email"]);
    $phone = htmlspecialchars ($_POST["phone"]);
    $password = htmlspecialchars ($_POST["password"]);
    $confirm = htmlspecialchars ($_POST["confirm"]);

    //simpan data ke dalam database
    $register = mysqli_query ($koneksi,"INSERT INTO ujikom VALUES('','$fullname','$username','$email','$phone','$password','$confirm')");


if($ubah){
  echo"<script>
    alert('Data telah Diubah');
    </script>";
  }else{
    echo"<script>
  alert('Data Gagal Diubah');
  </script>";
  }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi form in HTML and css | codehal</title>
    <link rel="stylesheet" href="styleregister.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="wrapper">
        <form action="">
            <h1>Registration</h1>

            <div class="input-box">
            <div class="input-field">
            <input type="text" placeholder="FullName"required value="">
            <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <div class="input-field">
                <input type="text" placeholder="Username" required value="">
                <i class='bx bxs-user'></i>
            </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                <input type="email" placeholder="Email"
                required value="">
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <div class="input-field">
                <input type="number" placeholder="PhoneNumber" required value="">
                <i class='bx bxs-phone'></i>
            </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                <input type="password" 
                placeholder="Password"required value="">
                <i class='bx bxs-lock-alt'></i>
            </div>
            
            <div class="input-box">
                <div class="input-field">
                <input type="password" placeholder="Confirm Password"required value="">
                <i class='bx bxs-lock-alt'></i>
            </div>
            </div>
            <label><input type="checkbox">I hereby declare 
                that the above information provided is true and 
                correct</label>
        
            <button type="submit" name="register" class="btn">register</button>
            </div>
            </div>
        </form>
    </div>
    
</body>
</html>