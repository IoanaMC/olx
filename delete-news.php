<?php
require_once('config.php');
$query="DELETE FROM  anunturi WHERE id_anunt =".$_GET['id'];
$a= mysql_query($query);
$queryNou="DELETE FROM  referinte WHERE id_anunt_ref =".$_GET['id'];
$b=mysql_query($queryNou);

 if ($a===true and $b===true) {
 	$myhost  = $_SERVER['HTTP_HOST'];
 	$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
 	$mypage = 'my-news.php';
 	header("Location: http://$myhost$mysps/$mypage");
 	exit;
 } else {
 	$myhost  = $_SERVER['HTTP_HOST'];
 	$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
 	$mypage = 'my-news.php';
 	header("Location: http://$myhost$mysps/$mypage?errors=5");
 	die();
 } 
?>