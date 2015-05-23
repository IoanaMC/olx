<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-sm-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-sm-12 default-bg padding-bottom-30 cont-style">
                    <div id="breadcrumb" class="col-sm-12 margin-20">
                        ACASA / Adauga Produse
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-12">
							<?php
								if (isset($_SESSION['nu'])) {
							?>
                            <h3>Buna, <?php echo $_SESSION['nume'] ?></h3>
							<?php } ?>
                        </div>
						<?php
							if (!(isset($_SESSION['nu']))) {
								echo '<span class="text-danger">Acces interzis!</span>';
							} else {
						?>

						<?php 
							if (isset($_GET['errors'])) {
								echo '<p class="text-danger">';
									if ($_GET['errors'] == '1') {
										echo 'Fisierul trebuie sa fie o imagine';
									} else if ($_GET['errors'] == '2') {
										echo 'Marimea fisierului este mai mare de 1MB';
									} else if ($_GET['errors'] == '3') {
										echo 'Folderul specificat nu poate fi accesat. (CHMOD 777)';
									} else if ($_GET['errors'] == '4') {
										echo 'A aparut o eroare. Mai incearca odata.';
									} else if ($_GET['errors'] == '5') {
										echo 'Eroare la scrierea in baza de date!';
									}
								echo '</p>';
							}
						?>
						<div class="add-box col-sm-12">
							<form action="insert-news.php" method="post" enctype="multipart/form-data" id="form-insert">
								<div class="col-sm-12 margin-bottom-20">
									<div class="col-sm-3">Titlu:</div>
									<div class="col-sm-7">
										<input type="text" name="titlu">
									</div>
								</div>
								<div class="col-sm-12 margin-bottom-20">
									<div class="col-sm-3">Imagine:</div>
									<div class="col-sm-7">
										<input type="file" name="atasament" accept="image/*">
									</div>
								</div>
								<div class="col-sm-12 margin-bottom-20">
									<div class="col-sm-3">Categorie:</div>
									<div class="col-sm-7 text-left">
										<select name="selectie">
											<!-- incarcam numele categoriilor existente in DB -->
											<?php
												$query = "SELECT titlu_categorie, id_categorie FROM categorii";
												$result = mysql_query($query);
												while ($row=mysql_fetch_array($result)){
													echo '<option value="'.$row["id_categorie"].'">'.$row["titlu_categorie"].'</option>';	
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-sm-12 margin-bottom-20">
									<div class="col-sm-3">Judet:</div>
									<div class="col-sm-7 text-left">
										<select name="selectie_judet">
											<!-- incarcam numele judetelor existente in DB -->
											<?php
												$queryJudet = "SELECT id_judet, nume_judet FROM judete";
												$resultJudet = mysql_query($queryJudet);
												while ($rowJudet=mysql_fetch_array($resultJudet)){
													echo '<option value="'.$rowJudet["id_judet"].'">'.$rowJudet["nume_judet"].'</option>';	
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-sm-12 margin-bottom-20">
									<div class="col-sm-3">Oras:</div>
									<div class="col-sm-7 text-left">
										<select name="selectie_oras">
											<!-- incarcam numele judetelor existente in DB -->
											<?php
												$queryJudet = "SELECT id_oras, nume_oras FROM orase";
												$resultJudet = mysql_query($queryJudet);
												while ($rowJudet=mysql_fetch_array($resultJudet)){
													echo '<option value="'.$rowJudet["id_oras"].'">'.$rowJudet["nume_oras"].'</option>';	
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-sm-12 margin-bottom-20">
									<div class="col-sm-3">Descriere:</div>
									<div class="col-sm-7">
										<textarea name="descriere"></textarea>
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<input type="submit" name="save" value="Salveaza" class="btn btn-small btn-default-color btn-primary-bg">
								</div>
							</form>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('inc/footer.php'); ?>
<?php include('inc/footer.inc.php'); ?>