<?php
session_start();
$cart = $_SESSION['cart'];
$total_price = 0;

foreach ($cart as $product) {
    $total_price += $product['price'];
}

session_start();

// Sprawdzamy, czy koszyk nie jest pusty
if (!empty($_SESSION['cart'])) {

  // Tworzymy tablicę, w której będą przechowywane produkty
  $products = [];

  // Przechodzimy przez wszystkie produkty w koszyku
  foreach ($_SESSION['cart'] as $product) {
    $products[] = $product['name'] . ' (' . $product['price'] . ' zł)';
  }

  // Łączymy produkty w jeden łańcuch znaków
  $content = implode("\n", $products);

  // Tworzymy nazwę pliku, w którym będą zapisane produkty
  $filename = 'koszyk.txt';

  // Zapisujemy zawartość koszyka do pliku
  file_put_contents($filename, $content);

  // Komunikat o powodzeniu zapisu do pliku
  echo 'Koszyk został zapisany do pliku ' . $filename;
} else {
  echo 'Koszyk jest pusty';
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sklep- Pamięć która zapomina</title>
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
<form action="eksportuj-koszyk.php" method="post">
            <input type="submit" name="reset_cart" value="Resetuj koszyk" class="button">
            </body>
            </html> 