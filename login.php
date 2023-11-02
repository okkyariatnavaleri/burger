 <?php
 session_start();

 if (isset($_SESSION["login"])){
    header('Location: index.php');
    exit;
 }

require 'function.php';
if (isset($_POST["login"])){

    $username = $_POST ["username"]; 
    $password = $_POST ["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){

            //cek session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit ;
        }
    }

    $error = true;
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <title>Halangan Login</title>
    <link rel="stylesheet" href="assets/style.css">
 </head>
 <body>
   

<div class="login">
    <img src="assets/img/icon.png" class="icon">
    <h1>Login Here</h1>
    <?php if (isset($error)): ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
        <?php endif; ?>
    <form action = "" method = "post">

    <ul>
        <li>
            <label for = "username">username:</label>
            <input type = "text" name = "username" id = "username">
        </li>
        <li>
        <label for = "password">password:</label>
            <input type = "password" name = "password" id = "password">
        </li>
        <li>
            <button class= "tombol" type = "submit" name = "login">Login</button>
        </li>
    </ul>

    </form>
</div>
 </body>
 </html>



