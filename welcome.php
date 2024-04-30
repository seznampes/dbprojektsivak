<?php
session_start();

// Pripojenie k databáze
$conn = mysqli_connect('localhost','root','','tretiaci');
// Overenie pripojenia
if (!$conn) {
    die("Pripojenie zlyhalo: " . mysqli_connect_error());
}

// Predvolené triedenie je od najvyššej ceny po najnižšiu
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'cena DESC';

// Dotaz na databázu na získanie produktov s možnosťou triedenia
$sql = "SELECT * FROM produkty ORDER BY $order_by";
$result = mysqli_query($conn, $sql);

// Uzavretie pripojenia
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <style>
        /* Štýly tu */
    </style>
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="text">
        Produkty
    </div>
    <div class="produkty">
        <!-- Formulár na výber triedenia -->
        <form action="" method="get">
            <label for="order_by">Zoradiť podľa ceny:</label>
            <select name="order_by" id="order_by">
                <option value="cena DESC" <?php if ($order_by == 'cena DESC') echo 'selected'; ?>>Od najvyššej po najnižšiu</option>
                <option value="cena ASC" <?php if ($order_by == 'cena ASC') echo 'selected'; ?>>Od najnižšej po najvyššiu</option>
            </select>
            <button type="submit">Zoradiť</button>
        </form>

        <!-- Výpis produktov -->
        <?php
        // Vypíše produkty v divoch po troch v riadku
        $counter = 0;
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if ($counter % 3 == 0) {
                    echo "<div class='row'>";
                }
                echo "<div class='product'>";
                echo "<h3>" . $row['nazov'] . "</h3>";
                echo "<p>" . $row['popis'] . "</p>";
                echo "<p>Cena: " . $row['cena'] . "</p>";
                echo "</div>";
                $counter++;
                if ($counter % 3 == 0) {
                    echo "</div>";
                }
            }
            // Uzatvorenie posledného riadku, ak nie je už uzavretý
            if ($counter % 3 != 0) {
                // Pridanie prázdnych divov pre zvyšok stĺpcov
                $remaining_columns = 3 - ($counter % 3);
                for ($i = 0; $i < $remaining_columns; $i++) {
                    echo "<div class='empty-product'></div>";
                }
                echo "</div>";
            }
        } else {
            echo "Žiadne produkty k dispozícii.";
        }
        ?>
    </div>
</div>
</body>
</html>

<style>
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            width: calc(30%);
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 20px;
            margin: 10px;
        }

        .empty-product {
            width: calc(30%);
            padding: 20px;
            border-radius: 20px;
            margin: 10px;
        }
        .single-product {
            width: 100%;
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
        }

        .produkty {
            width: 90%;
        }
        
        .row {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;    
        }

</style>
