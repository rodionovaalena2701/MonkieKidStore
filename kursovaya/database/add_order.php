<?php
session_start();
if (isset($_POST['number'])) {
  $number = $_POST['number'];
  if ($number == '') {
    unset($number);
  }
}

if (empty($number)) {
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
include ('dbconnect.php');
include ('id.php');
$result = $mysqli->query("SELECT * FROM orders, products, `status`, users WHERE orders.id_product = products.id_product AND orders.id_client  = users.id_user AND orders.id_status_order = status.id_status");
while ($myrow = $result->fetch_assoc()) {
  if ($myrow['login'] == $log) {
    $user = $myrow['id_user'];
  }
  if ($myrow['id_product'] == $id) {
    $sum = $number * $myrow['cost'];
  }
}
if ($myrow['adress'] != NULL) {
  $order = $mysqli->query("INSERT INTO orders (id_client, id_product, id_status_order, quantity_product, order_cost) VALUES ('$user', '$id', 1, '$number', '$sum')");
  header("Location: ../orders.php?id=$user");
} else
  print ("Нет адреса доставки. Для начала заполните его!");
?>
