<?php
session_start();
include "conn.php";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO `user` (`name`, `number`, `password`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $number, $hashedPassword);
    $stmt->execute();
    $userId = $stmt->insert_id;

    header("location:home.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css file/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Document</title>
</head>
<body>
<div id="background">
        <div id="top">
            <a href="#"  style="text-decoration:none;  color: white;">
               must@gmail.com
              </a>
              <a href="#"  style="text-decoration:none; color: white;">
                +255 8774836
              </a>
              <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;"></a>
              <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;"></a>
              <a href="#"  style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
        </div>
        <div id="menu">
            <div id="logo">LIBRARY<b style="color:#2c7ad6 ;">MUST</b>
            </div>
            <div id="menu1">
                <ul>
                    <a href="welcome.php"><li>Home</li></a>
                    <a href="admin.php"><li >Admin Login</li></a>
                    <a href="create.php"><li >Register</li></a>
                    <a href="home.php"><li >Login</li></a>

                </ul>
            </div>   
        </div>
        <div id="slider">
            <div id="x">
            <img src="css file/image/must log.png" alt="must logo" > 
            WELCOME MUST LIBRARY<b style="color: blue;">IYUNGA</b>
            <p style="font-size: 15PX;">WELCOME</p>
            </div> 
            <div id="y">
                <div id="l">
                    <h1 style=" text-align: center; color: #2c7ad6;">REGISTER</h1>
                    <div id="student">
  <form action="" method="POST">
    USER NAME <br><input type="text" name="name" class="t"/><br>
    REG NO <br><input type="number" name="number" class="t"/><br>
    PASSWORD <br>
    <div class="password-container">
      <input type="password" name="password" class="t password-input"/>
      <span class="password-toggle" onclick="togglePassword()">
        <i class="fas fa-eye" id="eye-icon"></i>
      </span>
    </div>
    RE- PASSWORD <br>
                            <div class="password-container">
                              <input type="password" name="password" class="t password-input"/>
                              <span class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="eye-icon"></i>
                              </span>
                            </div>
    <a href=""><input type="submit" name="submit" value="SAVE" style="border: none;width: 103%; height: 30px; background-color: #2c7ad6;"></a>
    <a href="#" style="color:blue; text-decoration: none;"><p >forget password</p></a>
  </form>
</div>
                </div>
            </div> 
          
        </div>
        <div id="down">
            <h3>Stay Connected</h3>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white; ">fecebook</a>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white;">inster</a>
            <a href="#" style="text-decoration: none; padding: 10px 12px;color: white;">tweater</a>
            <h2>Contant Address</h2>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white; ">
                must security
                Police Station : k
            </a> <br>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white;">
              +255 1324255671
            </a> <br>
            <a href="#" class="fa fa-envelope" style="text-decoration: none; padding: 10px 12px; color:white;">
              mustsecurity@gmail.com
              </a>
        </div>
        <div class="footer">Developed By : elkana </div>
    </div>
    <script src="js file/pass.js"></script>
</body>
</html>

</body>
</html>