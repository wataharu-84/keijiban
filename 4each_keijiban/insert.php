<?php
mb_internal_encoding("utf8");

require "DB.php";
$db = new DB();

// 書き換え	$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
$pdo = $db->connect();

// 書き換え	$pdo->exec("insert into 4each_keijiban(handlename,title,comments)
// values('".$_POST['handlename']."','".$_POST['title']."','".$_POST['comments']."');");
$stmt = $pdo->prepare($db->insert());

$stmt->bindValue(1,POST['handlename']);
$stmt->bindValue(2,POST['title']);
$stmt->bindValue(3,POST['comments']);

$stmt->execute();
$pdo = NULL;

header("Location:http://localhost/4each_keijiban/index.php");

?>