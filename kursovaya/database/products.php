<?php
session_start();

include ('dbconnect.php');
$result = $mysqli->query("SELECT DISTINCT * FROM products WHERE quantity != 0");
while ($myrow = $result->fetch_assoc()) {
  $idprod = $myrow['id_product'];
  $div .= '<a href="' . "product.php?id=$idprod" . '" class="product">';
  $div .= '<img src="' . $myrow['picture'] . '" alt="" class="product-img">';
  $div .= '<div class="product-info">';
  $div .= '<p class="cost">' . $myrow['cost'] . ' ₽</p>';
  $div .= '</div>';
  $div .= '<p class="product-name">' . $myrow['name_product'] . '</p>';
  $div .= '</a>';
}
echo $div;
?>