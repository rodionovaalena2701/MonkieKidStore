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
        <?php
        include ('database\dbconnect.php');

        $result = $mysqli->query("SELECT * FROM users WHERE login = '$log'");
        $myrow = $result->fetch_assoc();
        echo $div = '<p>Адрес доставки: ' . $myrow['adress'] . '</p>';
        ?>
      </div>
    </div>
  </main>
  <?php
  include ('tpl\footer.php');
  ?>
</body>

</html>