<?php
session_start();
include ('tpl/header.php');
include ('database\id.php');
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
  <main class="main">
    <div class="container">
      <div class="content">
        <a href="index.php" class="back-link">Меню</a>
        <?php
        include ('database/dbconnect.php');
        $result = $mysqli->query("SELECT * FROM orders, products, `status`, users WHERE orders.id_product = products.id_product AND orders.id_client  = users.id_user AND orders.id_status_order = status.id_status AND users.login = '$log'");
        while ($myrow = $result->fetch_assoc()) {
          $div .= '<p>Товар: ' . $myrow['name_product'] . '</p>';
          $div .= '<p>Количество: ' . $myrow['quantity_product'] . '</p>';
          $div .= '<p>Статус: ' . $myrow['status'] . '</p>';
          $div .= '<p>Цена: ' . $myrow['order_cost'] . ' ₽</p>';
        }
        echo $div;
        ?>
      </div>
    </div>
  </main>
  <?php
  include ('tpl\footer.php');
  ?>
</body>

</html>