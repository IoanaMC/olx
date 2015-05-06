<?php
ob_start();
session_start();
set_time_limit(0);
error_reporting(E_ALL ^ E_DEPRECATED);

// Informatii baza de date

 $AdresaBazaDate = "localhost";
 $UtilizatorBazaDate = "root";
 $ParolaBazaDate = "";
 $NumeBazaDate = "magazin";

$conexiune = mysql_connect($AdresaBazaDate,$UtilizatorBazaDate,$ParolaBazaDate) or die("Nu ma pot conecta la MySQL!");
mysql_select_db($NumeBazaDate, $conexiune) or die("Nu gasesc baza de date");
?>