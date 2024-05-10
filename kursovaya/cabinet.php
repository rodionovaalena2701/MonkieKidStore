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
        <div class="info">
          <?php
          include ('database/dbconnect.php');
          include ('database/id.php');

          $result = $mysqli->query("SELECT * FROM users WHERE login = '$log'");
          $myrow = $result->fetch_assoc();
          $div .= '<div class="cab-info">';
          $div .= '<a href="index.php" class="back-link">Меню</a>';
          if ($myrow['nickname'] != NULL) {
            $div .= '<p class="nick-name">' . $myrow['nickname'] . '</p>';
          } else {
            $div .= '<p class="nick-name">' . $myrow['name'] . '</p>';
          }
          $div .= '<div class="full-name">';
          $div .= '<p class="person-info">' . $myrow['surname'] . '</p>';
          $div .= '<p class="person-info">' . $myrow['name'] . '</p>';
          $div .= '<p class="person-info">' . $myrow['patronymic'] . '</p>';
          $div .= '</div>';
          $div .= '<div class="numb">';
          $div .= '<p class="cab-title">Телефон</p>';
          $div .= '<p class="person-info">' . $myrow['phone'] . '</p>';
          $div .= '</div>';
          $div .= '<div class="email">';
          $div .= '<p class="cab-title">Почта</p>';
          if ($myrow['email'] != NULL) {
            $div .= '<p class="person-info">' . $myrow['email'] . '</p>';
          } else {
            $div .= '<p class="person-info">Не указано</p>';
          }
          $div .= '</div>';
          $div .= '</div>';
          $div .= '<img src = "' . $myrow['avatar'] . '" class="cab-img">';
          echo $div;
          ?>
        </div>
        <div class="client-buttons">
          <?php
          $client .= '<a href="' . "orders.php?id=$id" . '" class="client-link"><button class="client-button">Заказы</button></a>';
          $client .= '<a href="' . "reviews.php?id=$id" . '" class="client-link"><button class="client-button">Отзывы</button></a>';
          if ($myrow['adress'] == NULL) {
            $client .= '<a href="address.html" class="client-link"><button id="cab-button" class="client-button">Адрес доставки</button></a>';
          } else {
            $client .= '<a href="' . "address.php?id=$id" . '" class="client-link"><button id="cab-button" class="client-button">Адрес доставки</button></a>';
          }
          echo $client;
          ?>
        </div>
      </div>
    </div>
  </main>

  <?php
  include ('tpl\footer.php');
  ?>
</body>

</html>