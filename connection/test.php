<?php
include 'connect.php';

$stmt=$connect->prepare("SELECT count(*) FROM  posts ");
$stmt->execute();
$stmt=$stmt->fetch();
print_r($stmt);




?>


