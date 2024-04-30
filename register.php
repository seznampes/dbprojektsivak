<?php
    $error="";
    $conn = mysqli_connect('localhost','root','','tretiaci');

    if(!$conn){
        echo 'Nefunguje databaza';
    }

    if(isset($_POST['meno']) && isset($_POST['heslo']) && isset($_POST['heslo_confirm'])) {
        $meno = $_POST['meno'];
        $heslo = $_POST['heslo'];
        $heslo_confirm = $_POST['heslo_confirm'];

        if($heslo != $heslo_confirm) {
            $error = "Passwords do not match";
        }
        else{

    $heslo = password_hash($heslo, PASSWORD_DEFAULT);

    
    $sql = "SELECT meno FROM pouzivatel WHERE meno = '".$meno."';";
    $result = $conn->query($sql);
      
    if ($result->num_rows > 0) {
        //vypisat chybu ze pouzivatel uz existuje
        $error = "This username already exists";
    } else{
        $sql = "INSERT INTO pouzivatel(meno, heslo) VALUES ('$meno', '$heslo')";
       
        $error = 'Registrácia prebehla úspešne!';

        $result = mysqli_query($conn, $sql); 
    }
    
    }
    }
    $conn->close();
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
        <form action="register.php" method="post">
            <div class="text">
                Registrácia
            </div>
            <div class="top">
            <input type="text" name="meno" placeholder="Meno:" required>
            <input type="password" name="heslo" placeholder="Heslo:" required>
            <input type="password" name="heslo_confirm" placeholder="Potvrďte heslo:" required>
                <button type="submit" name="submit">
                Registrovať
            </button>
            <div class="register">
                <a href="index.php">Login</a>
            </div>
            </div>
        
        </form>
        
    </div>
    <br>
    <div class="error">
        <p><?php echo $error ;?></p>
        </div>
</body>
</html>