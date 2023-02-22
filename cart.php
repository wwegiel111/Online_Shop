<?php
session_start();
$cart = $_SESSION['cart'];
$total_price = 0;

foreach ($cart as $product) {
    $total_price += $product['price'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Koszyk - Sklep internetowy z częściami komputerowymi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Koszyk</h1>
        <a href="index.php" class="button">Wróć do sklepu</a>
    </header>
    <main>
        <table>
            <tr>
                <th>Nazwa</th>
                <th>Cena</th>
            </tr>
            <?php foreach ($cart as $product) { ?>
                <tr>
                    <td><?php echo
                $product['name']; ?></td>
                <td><?php echo $product['price']; ?> zł</td>
            </tr>
        <?php } ?>
        <tr>
            <td>Łącznie:</td>
            <td><?php echo $total_price; ?> zł</td>
        </tr>
    </table>
</main>
            </body>
            </html> 