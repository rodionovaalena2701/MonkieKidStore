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
  <link rel="stylesheet" type="text/css" href="css\media.css">
</head>

<body>
  <main class="main">
    <div class="container">
      <div class="content">
        <input type="text" class="searching input" placeholder="Поиск товара...">
        <div class="categories">
          <div class="category">
            <a href="#prod" class="cated-link" name="default">
              <img src="img\категории\процент.svg" alt="" class="categ-icon">
              <p class="categ-text">Хит продаж</p>
            </a>
          </div>
          <div class="category">
            <a href="#prod" class="cated-link">
              <img src="img\категории\огонь.svg" alt="" class="categ-icon">
              <p class="categ-text">Горящие скидки</p>
            </a>
          </div>
          <div class="category">
            <a href="#" class="cated-link">
              <img src="img\категории\ракета.svg" alt="" class="categ-icon">
              <p class="categ-text">Экспресс доставка</p>
            </a>
          </div>
          <div class="category">
            <a href="#" class="cated-link">
              <img src="img\категории\планета.svg" alt="" class="categ-icon">
              <p class="categ-text">Из-за рубежа</p>
            </a>
          </div>
          <div class="category">
            <a href="#" class="cated-link">
              <img src="img\категории\брелок.svg" alt="" class="categ-icon">
              <p class="categ-text">Брелки и значки</p>
            </a>
          </div>
          <div class="category">
            <a href="#" class="cated-link">
              <img src="img\категории\игрушка.svg" alt="" class="categ-icon">
              <p class="categ-text">Плюшевые игрушки</p>
            </a>
          </div>
          <div class="category">
            <a href="#" class="cated-link">
              <img src="img\категории\посох.svg" alt="" class="categ-icon">
              <p class="categ-text">Аксессуары</p>
            </a>
          </div>
          <div class="category">
            <a href="#" class="cated-link">
              <img src="img\категории\лего.svg" alt="" class="categ-icon">
              <p class="categ-text">Наборы LEGO</p>
            </a>
          </div>
        </div>

        <div class="main-products">
          <p class="title">Рекомендуемые вам</p>
          <div class="products" id="prod">
            <?php
            include ('database\products.php');
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include ('tpl\footer.php');
  ?>
</body>

</html>