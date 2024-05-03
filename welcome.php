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
$search_term = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Prepare the SQL query to fetch products based on the search term, category, and order
$sql = "SELECT produkty.*, kategorie.nazov AS kategoria_nazov FROM produkty 
        LEFT JOIN kategorie ON produkty.kategoria_id = kategorie.id";

if (!empty($search_term) && empty($category)) {
    $sql .= " WHERE produkty.nazov LIKE '%" . mysqli_real_escape_string($conn, $search_term) . "%'";
} elseif (!empty($search_term) && !empty($category)) {
    $sql .= " WHERE produkty.nazov LIKE '%" . mysqli_real_escape_string($conn, $search_term) . "%' 
              AND produkty.kategoria_id = " . mysqli_real_escape_string($conn, $category);
} elseif (empty($search_term) && !empty($category)) {
    $sql .= " WHERE produkty.kategoria_id = " . mysqli_real_escape_string($conn, $category);
}
$sql .= " ORDER BY " . $order_by;  // Apply ordering

// Execute the query
$result = mysqli_query($conn, $sql);

$sql = "SELECT produkty.*, kategorie.nazov AS kategoria_nazov FROM produkty LEFT JOIN kategorie ON produkty.kategoria_id = kategorie.id ORDER BY $order_by";
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
    <div class="searchbar">
    <form action="" method="get">
    <input type="text" name="search" placeholder="Názov produktu" value="<?php echo htmlspecialchars($search_term); ?>">
    </select>
    <button type="submit">Search</button>
</form>
</div>
    <div class="produkty">
        <!-- Formulár na výber triedenia -->
        <form class="zorcen" action="" method="get">
            <label  for="order_by">Zoradiť podľa ceny:</label>
            <select name="order_by" id="order_by">
                <option value="cena DESC" <?php if ($order_by == 'cena DESC') echo 'selected'; ?>>Od najvyššej po najnižšiu</option>
                <option value="cena ASC" <?php if ($order_by == 'cena ASC') echo 'selected'; ?>>Od najnižšej po najvyššiu</option>
            </select>
            <button type="submit">Zoradiť</button>
        </form>
        <form class="filtkat" action="" method="get">
            <label  for="category">Filtrovať podľa kategórie:</label>
            <select name="category" id="category">
                <option value="">Všetky kategórie</option>
                <option value="1">Herná myš</option>
                <option value="2">Herná klávesnica</option>
                <option value="3">Herná podložka</option>
            </select>
            <button class="kat" type="submit">Filtrovať</button>
        </form>
    <?php
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($counter % 3 == 0) {
                echo "<div class='row'>";
            }
            echo "<div class='product'>";
            echo "<h3>" . htmlspecialchars($row['nazov']) . "</h3>";
            echo "<div class='category'><strong>Kategória:</strong> " . htmlspecialchars($row['kategoria_nazov']) . "</div>";
            echo "<div class='description'>" . htmlspecialchars($row['popis']) . "</div>";
            echo "<div class='price'>Cena: " . htmlspecialchars($row['cena']) . " €</div>";
            echo "</div>";
            $counter++;
            if ($counter % 3 == 0) {
                echo "</div>"; // Close row
            }
        }
        if ($counter % 3 != 0) {
            while ($counter % 3 != 0) {
                echo "<div class='product empty'></div>"; // Fill empty spaces
                $counter++;
            }
            echo "</div>"; // Close last row
        }
    } else {
        echo "<div>No products found.</div>";
    }
    ?>
</div>
    </div>
</div>
</body>
</html>

<style>
        *{
            margin: 0px;
        }
        .form-control {
            display: flex;
            align-items: center;  
            gap: 10px;            
        }
        .zorcen{
        font-size: 17px;
        font-weight: 600;
        font-family: sans-serif;
        color: white;
        margin-bottom: 5px;
        margin-left: 15px;
        }
        .filtkat{
        font-size: 17px;
        font-weight: 600;
        font-family: sans-serif;
        color: white;
        margin-left: 15px;
        }
        input[type="text"], select, button {
            height: 35px;            
            padding: 0px 12px;       
            border: 1px solid #ccc;  
            border-radius: 4px;      
            box-sizing: border-box;  
        }

        button {
            background-color: #007bff;  
            color: white;              
            border: 1px solid #fff 50%;     
            cursor: pointer;           
        }

        button:hover {
            background-color: #0056b3;  
        }
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

        .product:hover {
            transform: translateY(-5px);
        }

        .category, .description, .price {
            margin-top: 10px;
        }

        .empty {
            visibility: hidden;
        }


</style>
