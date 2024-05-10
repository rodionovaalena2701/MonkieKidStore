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
        <div class="prod">


          <?php
          include ("database/dbconnect.php");
          include ("database/id.php");
          include ("database/rating.php");
          $result = $mysqli->query("SELECT * FROM products WHERE id_product = '$id'");
          $myrow = $result->fetch_assoc();
          $id = $myrow['id_product'];
          $div .= '<img src="' . $myrow['picture'] . '" alt="" class="prod-img">';
          $div .= '<div class="prod-info">
            <p class="prod-title">' . $myrow['name_product'] . '</p>';
          $div .= '<div class="stars-cost">
              <div class="stars">
                <img src="img\звезда.svg" alt="" class="star">
                <img src="img\звезда.svg" alt="" class="star">
                <img src="img\звезда.svg" alt="" class="star">
                <img src="img\звезда.svg" alt="" class="star">
                <img src="img\звезда.svg" alt="" class="star">
                <p class="star-text">' . $rating . '</p>
              </div>';
          $div .= '<p class="prod-cost">' . $myrow['cost'] . ' ₽</p>
          </div>';
          $div .= '<div class="charact">
              <p class="char">Описание</p>';
          $div .= '<p class="char">' . $myrow['year'] . ' год</p>';
          $div .= '<p class="char">В наличии: ' . $myrow['quantity'] . '</p>
            </div>';
          $div .= '<div class="country">
              <p class="countr">Страна-производитель:</p>';
          $div .= '<p class="countr">' . $myrow['country'] . '</p>
            </div>';
          $div .= '<div class="btns">';
          $div .= '<form action="' . "database\add_cart.php?id=$id" . '" method="post">';
          $div .= '<input type="hidden" name="name" value="' . $myrow['name_product'] . '">';
          $div .= '<input type="submit" class="btn" value="В корзину">';
          $div .= '</form>';
          $div .= '<a href="' . "order.php?id=$id" . '"><button class="btn">Купить сейчас</button></a>';
          $div .= '</div></div>';
          echo $div;
          ?>
        </div>
        <div class="review-block">
          <p class="title">Отзывы</p>

          <?php
          $result2 = $mysqli->query("SELECT * FROM reviews, orders, users, products WHERE reviews.id_order = '$id' AND reviews.id_order = orders.id_order AND orders.id_product = products.id_product AND orders.id_client  = users.id_user");
          $rev .= '';
          while ($myrow2 = $result2->fetch_assoc()) {
            $rev .= '<div class="review">';
            $rev .= '<img src="' . $myrow2['avatar'] . '" alt="" class="review-ava">';
            $rev .= '<div class="review-info">
            <div class="review-head">';
            if ($myrow2['nickname'] != NULL) {
              $rev .= '<p class="nickname">' . $myrow2['nickname'] . '</p>';
            } else {
              $rev .= '<p class="nickname">' . $myrow2['name'] . '</p>';
            }
            $rev .= '<div class="stars">
            <p class="star-text">' . $myrow2['stars'] . '</p>';
            $rev .= '<img src="img\звезда.svg" alt="" class="star">';
            $rev .= '<p class="theme">' . $myrow2['theme'] . '</p>
            </div></div>';
            $rev .= '<p class="review-text">' . $myrow2['desc'] . '</p>
          </div></div>';
          }
          echo $rev;
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