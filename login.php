<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

<?php
if (!(isset($_SESSION['nu']))) { /*daca nu e deja logat*/
	if (isset($_POST['btnLogin'])) {
        $numeu = '';
        $parolau = '';
        if (isset($_POST['NumeUser'], $_POST['Parola'])) {
			$numeu = mysql_real_escape_string($_POST['NumeUser']);
			$parolau = mysql_real_escape_string($_POST['Parola']);
			
			$sql = "SELECT id,nume FROM utilizator WHERE nume = '$numeu' AND parola = '$parolau'";
			$result = mysql_query($sql);
			if ($result != FALSE) {
				if (mysql_num_rows($result) == 1) {
					$row = mysql_fetch_assoc($result);
					if ($row != FALSE) {
						$_SESSION['nu']= $row['id'];
						$_SESSION['nume'] = $row['nume'];
						
						$myhost  = $_SERVER['HTTP_HOST'];
						$mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$mypage = 'homepage.php';
						header("Location: http://$myhost$mysps/$mypage");                
						exit;
					} else {
						$msgdb = 'Eroare';
					}
				} else {
					$msgerror = 'Eroare';
				}
			} else {
				$msgdb = 'Eroare';
			}                   
        } else {
            $msgerror = 'Eroare';
        }
	}
?>

<div class="col-sm-12 glow-background">
	<div class="container">
		<div class="create-account-message">
	        Pentru a adauga anunturi,<span class="primary-color">va rugam sa va autentificati </span>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="header-form">
				<strong>Intra</strong> <span class="secondary-color">in cont</span>
			</div>
			<div class="create-form col-sm-12 inline-block">
				<?php
					if (isset($_POST['btnLogin'])) {
						echo '<span class="errmsg">';
						if (isset($msgerror)) {
							echo '<div class="col-sm-12 margin-top-10"><p class="text-danger">Datele introduse nu sunt corecte!</p></div>';
						}
						if (isset($msgdb)) {
							echo '<div class="col-sm-12 margin-top-10"><p class="text-danger">Datorita unor probleme tehnice, continutul nu se poate afisa. Va rugam incercaţi mai tarziu.</p></div>';
						}
						echo '</span>';
					}
				?>
				<div class="login-form col-sm-12">
					<form action="login.php" method="post" name="userLogin" id="form-login">
						<div class="col-sm-12">
							<label for="NumeUser">Nume:</label>
							<input name="NumeUser" type="text" id="NumeUser" class="col-sm-9 login-input"/>
						</div>
						<div class="col-sm-12">
							<label for="Parola">Parola:</label>
							<input name="Parola" type="password" id="Parola" class="col-sm-9 login-input"/>
						</div>
						<div class="col-sm-12">
							<input type="submit" name="btnLogin" value="Intra in cont" class="btn btn-small btn-default-color btn-primary-bg float-right"/>
						</div>
					</form>
				</div>
				<div class="col-sm-12 text-right">
					<a href="create-account.php" class="secondary-color"><b>Creaza un cont nou</b></a>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>
<?php
} else {
	echo '<span class="text-danger">Acces interzis!</span>';
}
?>

<?php include('inc/footer.inc.php'); ?>
