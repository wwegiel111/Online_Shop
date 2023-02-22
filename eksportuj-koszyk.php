<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$cart = $_SESSION['cart'];

if (!empty($cart)) {
  $nazwa_pliku = 'koszyk.txt';
  $zawartosc = "Produkty w koszyku:\n";
  
  foreach ($cart as $product) {
    $zawartosc .= "- " . $product['name'] . " (" . $product['price'] . " zł)\n";
  }

  $wynik = file_put_contents($nazwa_pliku, $zawartosc);

  if ($wynik !== false) {
    // Pomyślnie zapisano koszyk do pliku
    $_SESSION['cart'] = array();
  } else {
    // Błąd podczas zapisu do pliku
  }
}

header('Location: cart.php');
exit();
?>