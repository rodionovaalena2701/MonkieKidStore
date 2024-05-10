<?php
session_start();
include ('tpl/header.php');
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
        include ('database\id.php');

        $result = $mysqli->query("SELECT * FROM reviews, orders, users, products WHERE reviews.id_order = orders.id_order AND orders.id_product = products.id_product AND orders.id_client  = users.id_user AND users.login = '$log'");
        $rev .= '';
        while ($myrow = $result->fetch_assoc()) {
          $rev .= '<p>Товар: ' . $myrow['name_product'] . '</p>';
          $rev .= '<p>Оценка: ' . $myrow['stars'] . '</p>';
          if ($myrow['theme'] != NULL) {
            $rev .= '<p>Тема: ' . $myrow['theme'] . '</p>';
          }
          if ($myrow['desc'] != NULL) {
            $rev .= '<p>Описание: ' . $myrow['desc'] . '</p>';
          }

        }
        echo $rev;
        ?>
      </div>
    </div>
  </main>
  <?php
  include ('tpl\footer.php');
  ?>
</body>

</html>