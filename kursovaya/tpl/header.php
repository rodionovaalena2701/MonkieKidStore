<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Monkie Store — интернет магазин по мульфильму "LEGO Monkie Kid"!</title>
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="css\media.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="menu">
        <a href="index.php" class="icons">
          <img src="img\icon.png" alt="icon" class="header-icon">
          <img src="img\logo.png" alt="logo" class="header-logo">
        </a>
        <?php
        if (empty($_SESSION['login'])) {
          ?>
          <div class="navigation">
            <a href="registr.html" class="menu-link"><img src="img\Регистрация.svg" alt="" class="menu-button"></a>
            <a href="author.html" class="menu-link"><img src="img\Войти.svg" alt="" class="menu-button"></a>
          </div>
          <?php
        } else {
          $head .= '<div class="navi">
            <div class="menu-links">';
          $head .= '<a href="' . "cabinet.php?id=$id" . '" class="menu-link"> <img src="img\кабинет.svg" alt="" class="menu-button menu-hid">
                <img src="img\human.svg" alt="" class="icon"> </a>';
          $head .= '</div>';
          $head .= '<div class="menu-links">
          <a href="' . "cart.php?id=$id" . '" class="menu-link"> <img src="img\корзина.svg" alt="" class="menu-button menu-hid"> ';
          $head .= ' <img src="img\grocery.svg" alt="" class="icon"> </a>
        </div>';
          $head .= '<div class="menu-links">
          <a href="database\exit.php" class="menu-link">';
          $head .= '<img src="img\Выйти.svg" alt="" class="menu-button"></a>';
          $head .= '</div></div>';
          echo $head;
          ?>
          <?php
        }
        ?>
      </div>
    </div>
  </header>
</body>

</html>