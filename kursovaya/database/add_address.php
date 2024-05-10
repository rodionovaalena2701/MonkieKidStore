<?php
session_start();
if (isset($_POST['text'])) {
  $address = $_POST['text'];
  if ($address == '') {
    unset($address);
  }
}
if (empty($address)) {
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
include ('dbconnect.php');
include ('id.php');
$result = $mysqli->query("UPDATE `users` SET `adress` = '$address' WHERE login = $log");
if ($result == 'true') {
  header("Location: ../address.php?id=$id");
} else {
  echo "Ошибка! Сообщение не сохранено";
}
