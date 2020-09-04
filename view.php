<?php

$dbh=new PDO("mysql:host=localhost;dbname=bughound","root","");
$id=isset($_GET['id'])?$_GET['id']:"";
$stat=$dbh->prepare("SELECT * from attachment where attachment_Id=?");
$stat->bindParam(1,$id);
$stat->execute();
$row=$stat->fetch();
header('Content-type:'.$row['type']);
echo $row['data'];
?>