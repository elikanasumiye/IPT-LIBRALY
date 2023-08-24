<?php
session_start();
include "conn.php";

if(isset($_POST['submit'])){ // if user click submit buttone
    $number=$_POST['number'];
    $password=$_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE number = ?"); //select option and verify number colum
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
            header('Location: Garraly.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
     <link rel="stylesheet" href="css file/home.css" type="text/css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div id="background">
        <div id="top">
            <a href="#"  style="text-decoration:none;  color: white;">
                must@gmail.com
              </a>
              <a href="#"  style="text-decoration:none; color: white;">
                +255 25367848
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
                    <a href="home.php"><li >Home</li></a>
                    <a href="admin.php"><li>Admin Login</li></a>
                    <a href="create.php"><li >Register</li></a>

                </ul>
            </div>   
        </div>
        <div id="slider">
            <div id="x">
            <img src="css file/image/must log.png" alt="must logo" >
            <div >WELCOME AT MUST LIBRARY<b style="color: #2c7ad6;">IYUNGA</b>
            <p style="font-size: 15PX;">WELCOME</p>
</div>
            </div> 
            <div id="y">
                <div id="l">
                    <h1 style=" text-align: center; color: #2c7ad6;">STUDENT</h1>
                    <div id="student">
                        <form action="" method="POST">
                        <?php if (isset($errorMessage)): ?>
                       <p class="error"><?php echo $errorMessage; ?></p>
                            <?php endif; ?>
                            REG NO <br><input type="number" name="number" class="t"/><br>
                            PASSWORD <br>
                                  <div class="password-container">
                                    <input type="password" name="password" class="t password-input"/>
                                    <span class="password-toggle" onclick="togglePassword()">
                                      <i class="fas fa-eye" id="eye-icon"></i>
                                    </span>
                                  </div>
                            <a href=""><input type="submit" value="SAVE" name="submit" style="border: none;width: 103%; height: 30px; background-color: #2c7ad6;"></a>
                            <a href="#" style="color:blue; text-decoration: none;"><p >forget password</p></a>
                            </form>
                    </div>
                </div>
            </div> 
            <div id="z">
                <div id="r">
                    <h1 style=" text-align: center; color: white;">TEACHER</h1>
                    <div id="Teacher">
                        <form action="" method ="POST">
                        <?php if (isset($errorMessage)): ?>
                       <p class="error"><?php echo $errorMessage; ?></p>
                            <?php endif; ?>
                        REG NO <br><input type="number" name="number" class="t"/><br>
                        PASSWORD <br>
                                  <div class="password-container">
                                    <input type="password" name="password" class="t password-input"/>
                                    <span class="password-toggle" onclick="togglePassword()">
                                      <i class="fas fa-eye" id="eye-icon"></i>
                                    </span>
                                  </div>
                        
                        <a href=""><input type="submit" name="submit" value="SAVE" style="border: none;width: 103%; height: 30px; background-color: white;"></a>
                         <a href="#" style="color:white; text-decoration: none;"><p>forget password</p></a>
</form>
                    </div>
                </div>
            </div> 
        </div>
        <div id="down">
            <h3>Stay Connected</h3>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white; "></a>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white;"></a>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white;"></a>
            <h2>Contant Address</h2>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white; ">
               must security
                Police Station : 
            </a> <br>
            <a href="#"  style="text-decoration: none; padding: 10px 12px;color: white;">
              +255 121122 
            </a> <br>
            <a href="#"  style="text-decoration: none; padding: 10px 12px; color:white;">
              mustsecurity@gmail.com
              </a>
        </div>
        <div class="footer">Developed By : elkana</div>
    </div>
    <script src="js file/pass.js"></script>
</body>
</html>
