<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>
<?php require 'PHPMailer/PHPMailerAutoload.php'; ?>
                           
<?php
if (isset($_SESSION['nu'])) { /*daca userul e logat*/
    echo '<span class="text-danger">Acces interzis!</span>';
} else {
	if (isset($_POST['new-account-btn'])) {
        $newUserName = mysql_real_escape_string($_POST['name']);
        $newUserSurname = mysql_real_escape_string($_POST['surname']);
        $newUserEmail = mysql_real_escape_string($_POST['email']);
        $newUserPhone = mysql_real_escape_string($_POST['phone']);
        $newPassw = mysql_real_escape_string($_POST['password']);
        $newPassw2 = mysql_real_escape_string($_POST['confirm_password']);

		$sql = "SELECT id_util FROM utilizatori WHERE nume_util = '$newUserName'";
		$result = mysql_query($sql);
        if ($result != FALSE) {
            $nr_rez = mysql_num_rows($result);
            if ($nr_rez == 1) {
                $msg9 = 'Exista deja un utilizator cu acest nume. Introduceti un nume nou';
            }
            if ($nr_rez === FALSE) {
                $msgdb = 'eroare';
            }
            if ($nr_rez == 0) {
                $sql = "INSERT INTO utilizatori (nume_util, prenume_util, email_util, telefon_util, parola_util) VALUES ('$newUserName', '$newUserSurname', '$newUserEmail', '$newUserPhone', '$newPassw')";
                $result = mysql_query($sql);
                if ($result != FALSE) {
                    $sql_select = "SELECT id_util, nume_util FROM utilizatori WHERE nume_util = '$newUserName' AND parola_util = '$newPassw' LIMIT 1";
                    $result_select = mysql_query($sql_select);
                    if ($result_select != FALSE) {
                        $row = mysql_fetch_assoc($result_select);  
                        if ($row != FALSE) {
                            $_SESSION['nu'] = $row['id_util']; /*idul sesiunii pt noul utilizator*/
                            $_SESSION['nume'] = $row['nume_util'];

                            //Send email
                            $mail             = new PHPMailer();

                            $mail->IsSMTP();
                            $mail->SMTPAuth   = true;
                            $mail->SMTPSecure = "tls";
                            $mail->Username   = "emailnewsonline@gmail.com";
                            $mail->Password   = "emailnewsonline1234";          
                            $mail->Host       = "smtp.gmail.com";
                            $mail->Port       = 587;           

                            $mail->IsHTML(true);    // set email format to HTML
                            $mail->AddEmbeddedImage('email-img/bg-left-accepte.jpg', 'bg-left-accepte');
                            $mail->AddEmbeddedImage('email-img/email-header-projet-accepte.jpg', 'email-header-projet-accepte');
                            $mail->AddEmbeddedImage('email-img/btn-mon-projet.png', 'btn-mon-projet');
                            $mail->AddEmbeddedImage('email-img/bg-right-accepte.jpg', 'bg-right-accepte');
                            $mail->AddEmbeddedImage('email-img/separator-projet-accepte.jpg', 'separator-projet-accepte');
                            $mail->SetFrom('emailnewsonline@gmail.com', 'Admin News Online');
                            $mail->Subject    = "Welcome to our site";
                            $mail->Body    = file_get_contents('email-template.php');

                            $mail->AddAddress($newUserEmail,  $newUserName);

                            $mail->Send();


                            // Redirect to another page
                            $myhost  = $_SERVER['HTTP_HOST'];
                            $mysps   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                            $mypage = 'all-news.php';
                            header("Location: http://$myhost$mysps/$mypage");
                            ob_end_flush();
                            exit;
                        } else {
                            $msgdb = 'eroare';
                        }
                    } else {
                        $msgdb = 'eroare';
                    }
                } else {
                    $msgdb = 'eroare';
                }
            }
        } else {
            $msgdb = 'eroare';
        }
	}
?>

<div class="col-xs-12 glow-background">
	<div class="container">
		<div class="create-account-message">
            Ati ales sa va faceti cont la <span class="primary-color">Anunturi Vanzari</span>
		</div>
		<div class="col-xs-12">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<div class="header-form">
					<strong>Creare</strong> <span class="secondary-color">cont nou</span>
				</div>
				<div class="create-form col-xs-12 inline-block">
                    <?php 
                        if (isset($_POST['newbl'])) {
                            echo '<div class="col-xs-12 no-padding margin-bottom-10">';
                            if (isset($msg1)) {
                                echo '<p class="text-danger">'.$msg1.'</p>';
                            } else if (isset($msg3)) {
                                echo '<p class="text-danger">'.$msg3.'</p>';
                            } else if (isset($msg9)) {
                                echo '<p class="text-danger">'.$msg9.'</p>';
                            } else if (isset($msgdb)) {
                                echo '<p class="text-danger">'.$msgdb.'</p>';
                            } else if (isset($msgeror)) {
                                echo '<p class="text-danger">'.$msgeror.'</p>';
                            }
                            echo '</div>';
                        }
                    ?>
					<div class="text-form col-xs-12">Completati campurile :</div>     
                    <form action="create-account.php" method="post" name="newLogin" id="form-create-account" class="clearfix">
                        <div class="col-xs-12">
                            <label for="user">Nume: </label>
                            <input type="text" placeholder="Nume" name="name" id="name" class="col-xs-12" required="" data-name="Introduceti un nume" data-minLen="Minim 4 caractere"/>
                        </div>

                        <div class="col-xs-12">
                            <label for="user">Prenume: </label>
                            <input type="text" placeholder="Prenume" name="surname" id="surname" class="col-xs-12" required="" data-surname="Introduceti un prenume" data-minLen="Minim 4 caractere"/>
                        </div>

                        <div class="col-xs-12">
                            <label for="user">Telefon: </label>
                            <input type="text" placeholder="Telefon" name="phone" id="phone" class="col-xs-12" required="" data-telephone="Introduceti un numar de telefon" data-valid-telephone="Introduceti un numar de telefon valid"/>
                        </div>

                        <div class="col-xs-12">
                            <label for="user">Email: </label>
                            <input type="text" placeholder="Email" name="email" id="email" class="col-xs-12" required="" data-email="Introduceti o adresa de email" data-valid-email="Introduceti un email valid"/>
                        </div>

                        <div class="col-xs-12">
                            <label for="newParola">Parola (minim 4 caractere): </label>
                            <input type="password" placeholder="Parola" name="password" id="password" class="col-xs-12" data-password="Introduceti o parola" data-minLen="Minim 4 caractere"/>
                        </div>

                        <div class="col-xs-12">
                            <label for="newParola2">Confirmati parola:</label>
                            <input type="password" placeholder="Retastati parola" name="confirm_password" id="confirm_password" class="col-xs-12" required="" data-confirm-pass="Confirmati parola">
                        </div>

                        <div class="col-xs-12">
                            <input type="submit" name="new-account-btn" id="new-account-btn" value="Creaza un cont nou" class="btn btn-small btn-default-color btn-primary-bg float-right">
                        </div>
                    </form>
					<div class="col-xs-12 text-right">
						<a href="login.php" class="secondary-color"><b>Acceseaza un cont existent</b></a>
					</div>
				</div>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>
</div>

<?php
}
?>
<?php include('inc/footer.inc.php'); ?>