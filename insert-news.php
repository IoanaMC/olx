<?php
require_once('config.php');

$titlu=$_POST['titlu'];
$descriere=$_POST['descriere'];
$categorii=$_POST['selectie'];
$judet=$_POST['selectie_judet'];
$oras=$_POST['selectie_oras'];
$idu = $_SESSION['nu'];     
$today = date('j-m-y');

function uploadFile(){
	//Definim un array cu tipurile de fisiere suportate (jpg,png,bmp)
	$allowed_filetypes =array('.jpg','.png','.JPG');

	//Marimea maxima a unui fisier (1mb =1048576)
	$max_filesize= 1048576;

	//Definim calea catre directorul ce contine fisierele incarcate()
	$upload_path='./upload/';

	//Preluam numele fisierului din formular
	$filename=$_FILES['atasament']['name']; 

	//Aflam extensia fisierului
	$ext=substr($filename, strpos($filename,'.'), strlen($filename)-1); 

	//Verificam daca fisierul este acceptat. (jpg/bmp/png)
	if(!in_array($ext,$allowed_filetypes)) {
		$myhost  = $_SERVER['HTTP_HOST'];
		$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$mypage = 'add-news.php';
		header("Location: http://$myhost$mysps/$mypage?errors=1");
		die(); 
	}

	// Verificam marimea fisierului (max 1MB)
	if(filesize($_FILES['atasament']['tmp_name']) > $max_filesize) {
		$myhost  = $_SERVER['HTTP_HOST'];
		$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$mypage = 'add-news.php';
		header("Location: http://$myhost$mysps/$mypage?errors=2"); 
		die(); 
	}

	//Cream folderul "upload" daca acesta nu exista
	if (!is_dir('upload')) {
	    mkdir('upload', 0777);
	}   
	// Verifica daca folderul exista si poate fi accesat. (files)
	if(!is_writable($upload_path)){
		$myhost  = $_SERVER['HTTP_HOST'];
		$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$mypage = 'add-news.php';
		header("Location: http://$myhost$mysps/$mypage?errors=3"); 
		die(); 
	}
	    
	// Mutam fisierul in folderul specificat. (upload)
	if(move_uploaded_file($_FILES['atasament']['tmp_name'],$upload_path .$filename)){
	    echo '<a href="' . $upload_path . $filename . '" title="fisier" target="_blank"><br/><img src="'. $upload_path . $filename .'" width="120px"/></a>';
		return $upload_path . $filename;
	} else {
		$myhost  = $_SERVER['HTTP_HOST'];
		$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$mypage = 'add-news.php';
		header("Location: http://$myhost$mysps/$mypage?errors=4"); 
		die(); 
	}

}

$atasament=uploadFile();
$query="INSERT INTO anunturi(titlu_anunt, descriere_anunt, data_anunt, imagine_anunt, id_oras_anunt, id_judet_anunt) VALUES ('$titlu', '$descriere', '$today', '$atasament', '$oras', '$judet')";	
$a= mysql_query($query);

$nou="SELECT max(id_anunt) FROM anunturi";
$rez_temp=mysql_query($nou);
$rez= mysql_fetch_row($rez_temp);
$query2="INSERT INTO referinte(id_utilizator_ref,id_categorie_ref,id_anunt_ref) VALUES ($idu,$categorii,$rez[0])";
$b=mysql_query($query2);

if ($a===true && $b===TRUE) {
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