<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-sm-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-sm-12 default-bg padding-bottom-30 clearfix">
                    <div id="breadcrumb" class="col-sm-12 margin-20">
                        ACASA / Editare anunt
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-12">
							<?php
								if (isset($_SESSION['nu'])) {
							?>
                            <h3>Buna, <?php echo $_SESSION['nume'] ?></h3>
							<?php } ?>
                        </div>
						<div id="news-list" class="col-sm-12">
							<?php
							if (!(isset($_SESSION['nu']))) {
								echo '<span class="text-danger">Acces interzis!</span>';
							} else {
								echo $_GET["id"];
								$_SESSION['idn'] = $_GET["id"];
								$cerereEditNews = 'SELECT titlu_anunt, descriere_anunt, data_anunt, imagine_anunt, nume_util, titlu_categorie, id_oras, nume_oras, id_judet, nume_judet FROM anunturi INNER JOIN referinte ON id_anunt = id_anunt_ref INNER JOIN utilizatori ON id_utilizator_ref = id_util INNER JOIN categorii on id_categorie = id_categorie_ref INNER JOIN orase ON id_oras = id_oras_anunt INNER JOIN judete ON id_judet = id_judet_anunt WHERE id_anunt='.$_GET["id"];
								$result = mysql_query($cerereEditNews);
								if ($result != FALSE) {
									//if (mysql_num_rows($result) == 1) {
										$rand = mysql_fetch_array($result);
								?>
									<form action="update-news.php" method="post" enctype="multipart/form-data" id="form-insert">
										<div class="col-sm-12 margin-bottom-20">
											<div class="col-sm-3">Titlu:</div>
											<div class="col-sm-7">
												<input type="text" name="titlu" value=<?php echo $rand['titlu_anunt'] ?>>
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
														$queryOras = "SELECT id_oras, nume_oras FROM orase";
														$resultOras = mysql_query($queryOras);
														while ($rowOras=mysql_fetch_array($resultOras)){
															// echo "string";
															// if($rowOras["id_oras"] == $rand['id_oras']) echo " selected";
															echo '<option value="'.$rowOras["id_oras"].'">'.$rowOras["nume_oras"].'</option>';	
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-sm-12 margin-bottom-20">
											<div class="col-sm-3">Descriere:</div>
											<div class="col-sm-7">
												<textarea name="descriere"><?php echo $rand['descriere_anunt'] ?></textarea>
											</div>
										</div>
										<div class="col-sm-12 text-center">
											<input type="submit" name="edit" value="Salveaza" class="btn btn-small btn-default-color btn-primary-bg">
										</div>
									</form>

								<?php
									//}
								}
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