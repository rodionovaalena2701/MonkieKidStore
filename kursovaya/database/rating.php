<?php
session_start();
include ('dbconnect.php');

$rating = 5;
$count = 1;

$result = $mysqli->query("SELECT * FROM reviews, orders WHERE reviews.id_order = '$id' AND reviews.id_order = orders.id_order");
while ($myrow = $result->fetch_assoc()) {
  $rating = $rating + $myrow['stars'];
  $count++;
  $rating = $rating / $count;
}
?>