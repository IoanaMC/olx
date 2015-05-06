<?php
//distrugem sesiunea
 session_start(); 
 if (isset($_SESSION['nu'])) {
	 session_unset();
	 session_destroy();
 }
$myhost  = $_SERVER['HTTP_HOST'];
$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$mypage = 'homepage.php';
header("Location: http://$myhost$mysps/$mypage");
exit;
?>