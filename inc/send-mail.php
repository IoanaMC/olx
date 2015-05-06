<?php
	if (isset($_POST["send"])) {
		mail("yoanna90ro@yahoo.com","Mesaj de la ".$_POST['name'].' : '.$_POST['subject'], $_POST['message'],"From: ".$_POST['email']);
	}
?>