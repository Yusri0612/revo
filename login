<<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
   
</head>
<body>
    
    <div class="container">
        <div class="signup-selection">
            <header>signup</header>

            <div class="social-buttons">
                <button><i class='bx bxl-google'></i>use google</button>
                <button><i class='bx bxl-apple' ></i>use apple</button>
            </div>
            <div class="separator">
                <div class="line"></div>
                <p>OR</p>
                <div class="line"></div>
            </div>
                <form>
                    <input type="text"  placeholder="full name" required>
                    <input type="password" placeholder="password" required>
                    <input type="hidden" name="action" value="signup">
                    <a href="#">Forget Password?</a>
                    <button type="submit" class="btn" id="signupbtn">signup</button>
                </form>
        </div>

        <div class="login-selection">
            <header>Login</header>
           

            <div class="social-buttons">
                <button><i class='bx bxl-google'></i>use google</button>
                <button><i class='bx bxl-apple' ></i>use apple</button>
            </div>
            <div class="separator">
                <div class="line"></div>
                <p>OR</p>
                <div class="line"></div>
            </div>
            <form method="post" action="akun.php">
                <input type="text" name="username" placeholder="full name" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="hidden" name="action" value="login">
                <a href="#">Forget Password?</a>
               <button type="submit" name="login" class="btn" id="loginbtn">Login</button>

            </form>
            
        </div>

    </div>
    <script src="script.js"></script>
</body>
</html>




 $no = 1;
     $query = mysqli_query($koneksi, "SELECT * FROM tbl_pasien");
     while ($data = mysqli_fetch_array($query)){
     }