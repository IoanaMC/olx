<?php
require_once('config.php');

$titlu= $_POST['titlu'];
$descriere= $_POST['descriere'];
$categorii= $_POST['selectie'];
$judet= $_POST['selectie_judet'];
$oras= $_POST['selectie_oras'];
$idu = $_SESSION['nu'];  

$query="UPDATE anunturi SET titlu_anunt= '$titlu', descriere_anunt = '$descriere', id_oras_anunt = '$oras', id_judet_anunt = '$judet' WHERE id_anunt =".$_SESSION['idn'];	
$a= mysql_query($query);
$queryNou="UPDATE referinte SET id_categorie_ref = '$categorii' WHERE id_anunt_ref =".$_SESSION['idn'];
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
 	$mypage = 'add-news.php';
 	header("Location: http://$myhost$mysps/$mypage?errors=5"); 
 	die();
 } 
?>