<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" contents="width=device-width,initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codehal</title>
    <!-- <link rel="stylesheet" href="styleuser.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php require "../header.php" ?>

    <div class="wrapper">
        <form action="">
            <h1>Login Anggota</h1>
            <div class="input-box">
                <input type="text" placeholder="username" 
                required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" 
                required>
                <i class='bx bxs-lock-open-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">remember me</label> 
                <a href="#">Forgot password?</a>
                </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="#"></a></p>
                <a href="registeruser.php">Register</a></p>
        </form>
    </div>
<?php require "../footer.php" ?>
</body>
<html>