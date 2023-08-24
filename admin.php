<?php
session_start();
include "conn.php";

if(isset($_POST['submit'])){ // if user click submit buttone
    $number=$_POST['number'];
    $password=$_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE number = ?"); //select option and verify number colum
    $stmt->bind_param("s", $number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Start the session and set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['number'] = $number;

            // Redirect to the index page
            header('Location: add.php');
            exit;
        }
    }

    // Invalid credentials, show an error message
    $errorMessage = 'Invalid email or password';
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
              <a href="#" style="text-decoration:none; color: white;">
                +2555 77274784
              </a>
              <a href="#" style="text-decoration:none; padding:7px; float:right; color: white;">f</a>
              <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;">i</a>
              <a href="#"  style="text-decoration:none;  padding: 7px ; float:right; color: white;">t</a>
        </div>
        <div id="menu">
            <div id="logo">LIBRARY<b style="color:#2c7ad6 ;">MUST</b>
            </div>
            <div id="menu1">
                <ul>
                    <a href="home.php"><li>Home</li></a>
                    <a href="admin.php"><li>Admin Login</li></a>
                    <a href="create.php"><li class>Register</li></a>
                    <a href="home.php"><li>Login</li></a>

                </ul>
            </div>   
        </div>
        <div id="slider">
            <div id="x">WELCOME MUST LIBRARY<b style="color: blue;">IYUNGA</b>
            <p style="font-size: 15PX;">WELCOME</p>
            </div> 
            <div id="y">
                <div id="l">
                    <form action="" method="POST">
                    <h1 style=" text-align: center; color: #2c7ad6;">ADMIN LOGIN</h1>
                    <div id="student">
                    <form action="" method="POST">
                        <?php if (isset($errorMessage)): ?>
                       <p class="error"><?php echo $errorMessage; ?></p>
                            <?php endif; ?>
                            USER NAME <br><input type="text" name="number" class="t"/><br>
                            PASSWORD <br>
                     <div class="password-container">
                   <input type="password" name="password" class="t password-input"/>
                  <span class="password-toggle" onclick="togglePassword()">
                      <i class="fas fa-eye" id="eye-icon"></i>
                     </span>
                     </div>
                           
                            <a href=""><input type="submit" name="submit" value="SAVE" style="border: none;width: 103%; height: 30px; background-color: #2c7ad6;"></a>
                            <a href="#" style="color:blue; text-decoration: none;"><p >forget password</p></a>
                        
                    </div>
                  
                </div>
                </form>
            </div> 
          
        </div>
        <div id="down">
            <h3>Stay Connected</h3>
            <a href="#" style="text-decoration: none; padding: 10px 12px;color: white; "></a>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white;"></a>
            <a href="#"style="text-decoration: none; padding: 10px 12px;color: white;"></a>
            <h2>Contant Address</h2>
            <a href="#" style="text-decoration: none; padding: 10px 12px;color: white; ">
                must secirity
                Police Station : k
            </a> <br>
            <a href="#" class="fa fa-phone" style="text-decoration: none; padding: 10px 12px;color: white;">
              +255 24263748
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
