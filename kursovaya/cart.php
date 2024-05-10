<?php
session_start();
include ('tpl/header.php');
include ('database\id.php');
include ('database\dbconnect.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monkie Store — интернет магазин по мульфильму "LEGO Monkie Kid"!</title>
  <link rel="stylesheet" type="text/css" href="css\style.css">
</head>

<body>
  <div class="container">
    <main class="content">
      <?php
      $result = $mysqli->query("SELECT * FROM cart, users, products WHERE cart.id_product_cart = products.id_product AND cart.id_client_cart = users.id_user AND users.login = '$log'");
      if ($result == NULL) {
        $div .= '<p>В корзине ничего нет!</p>';
      } else {
        while ($myrow = $result->fetch_assoc()) {
          $div .= '<p>Товар: ' . $myrow['name_product'] . '</p>';
          $div .= '<p>Количество: 1</p>';
          $div .= '<a href="order.php?id=' . $myrow['id_product'] . '" style="text-decoration: none"><button class="btn submit">Оформить заказ</button></a>';
        }
        $user = $myrow['id_client_cart'];

      }
      echo $div;

      if (isset($_POST['clear_cart'])) {
        $clear = $mysqli->query("DELETE FROM cart");
        echo 'Корзина успешно очищена.';
      }

      ?>
      <form class="clear" action="cart.php" method="post">
        <input type="hidden" name="clear_cart" value="1">
        <input type="submit" class="submit btn" value="Очистить корзину">
      </form>
    </main>
  </div>
  <?php
  include ('tpl\footer.php');
  ?>
</body>

</html>