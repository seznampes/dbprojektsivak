<?php
   session_start();   //otvorenie session
   $error="";
    //kontrola ci uz bol potvrdeny formular a ci boli vyplnene obidva udaje aj username aj password
   if (isset($_POST['submit']) && !empty($_POST['meno']) 
      && !empty($_POST['heslo'])) {

        //connect string do DB
        $servername = "localhost";
        $username = "Denis";
        $password = "Denis";
        $dbname = "tretiaci";

        // Create connection
        $conn = new mysqli($servername, $username, 
            $password, $dbname);

        
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT heslo FROM pouzivatel where meno ='".$_POST['meno']."'";
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
          
          $row = $result->fetch_assoc();
          
            if(password_verify($_POST['heslo'],$row["heslo"])) {
                $_SESSION['valid'] = true; 
                $_SESSION['timeout'] = time();
                $_SESSION['meno'] = $_POST['meno'];

               
                header("Location: welcome.php", true, 301);
                exit();
          } else {
            $error= "Wrong password";
          }
        } else {
          $error= "Wrong username";
        }
    
    $conn->close();
   
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reglog.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <div class="text">
                Prihlásenie
            </div>
            <div class="top">
            <input type="text" name="meno" placeholder="Meno:">
            <input type="password" name="heslo" placeholder="Heslo:">
            <button type="submit" name="submit">
                Login
            </button>

            <div class="loginref">
            <a href="register.php" class="logref">Zaregistruj sa</a>
            </div>
            </div>
            
        </form>
        
    </div>
    <br>
    <div class="error">
        <?php echo $error ;?>
        </div>
</body>
</html>