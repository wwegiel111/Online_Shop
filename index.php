<?php
session_start();
$products = [
    ["name" => "Karta graficzna", "price" => 1200, "image" => "gpu.jpg"],
    ["name" => "Procesor", "price" => 800, "image" => "procesor.png"],
    ["name" => "Pamięć RAM", "price" => 300, "image" => "ram.jpg"],
    ["name" => "Dysk twardy", "price" => 200, "image" => "hdd.jpg"],
    ["name" => "Dysk SSD", "price" => 400, "image" => "ssd.png"],
    ["name" => "Zasilacz", "price" => 150, "image" => "zasilacz.jpg"],
    ["name" => "Obudowa", "price" => 100, "image" => "case.jpg"]
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    array_push($_SESSION['cart'], $products[$product_id]);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sklep Pamięć, która zapomina</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Pamięć, która zapomina</h1>
        <a href="cart.php" class="button">Koszyk (<?php echo count($_SESSION['cart']); ?>)</a>
    </header>
    <main>
        <?php foreach ($products as $id => $product) { ?>
            <div class="product">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h2><?php echo $product['name']; ?></h2>
                <p>Cena: <?php echo $product['price']; ?> zł</p>
                <form method="post" action="index.php">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <input type="submit" name="add_to_cart" value="Dodaj do koszyka" class="button">
                </form>
            </div>
        <?php } ?>
    </main>
</body>

</html>
