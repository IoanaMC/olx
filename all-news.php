<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-sm-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-sm-12 default-bg padding-bottom-30">
                    <div id="breadcrumb" class="col-sm-12 margin-20">
                        ACASA / Toate produsele
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-12">
							<?php
								if (isset($_SESSION['nu'])) {
							?>
                            <h3>Buna, <?php echo $_SESSION['nume'] ?></h3>
							<?php } ?>
                        </div>
						<div class="col-sm-12">
							<div class="col-sm-8">
								<?php
								if (!(isset($_SESSION['nu']))) {
									echo '<span class="text-danger">Acces interzis!</span>';
								} else {
									//selectam tot din tabelul Anunturi
									$cerereSQL = 'SELECT * FROM anunturi';
									$rezultat = mysql_query($cerereSQL);
									if ($rezultat != FALSE) {
										while($rand = mysql_fetch_array($rezultat)) {
											//retinem id-ul anuntului
											$id_anunt= $rand['id'];
											//selectam id-ul categoriei din tabelul Referinte
											$ref_categ ="SELECT id_categorie FROM referinte WHERE id_anunt=$id_anunt";
											$rezultat2=mysql_query($ref_categ);
											if ($rezultat2 != FALSE) {
												while($rand2 = mysql_fetch_array($rezultat2)) {
													//retinem id-ul categoriei
													$id_categ=$rand2['id_categorie'];
													//selectam titlul categoriei corespunzator id-ului
													$categ_nume="SELECT titlu FROM categorie WHERE id_categorie=$id_categ";
													$rezultat3=mysql_query($categ_nume);
													if ($rezultat3 != FALSE) {
														while($rand3 = mysql_fetch_array($rezultat3)) {
															$categorie=$rand3['titlu'];
														}
													} else {
														echo 'Eroare3';
													}
												}
											} else { 
												echo 'Error2';
											}
											// print $rand['titlu'];
											// die();
											?>
											<div class="col-sm-12 margin-bottom-10 secondary-bg no-padding">
												<div class="col-sm-12 padding-10">
													<div class="col-sm-12">Data: <?php echo $rand['data'] ?></div>
													<div class="col-sm-12">Nume articol: <?php echo $rand['titlu'] ?></div>
													<div class="col-sm-12">Categorii: <?php echo $categorie ?></div>
													<div class="col-sm-12">Descriere: <?php echo $rand['descriere'] ?></div>
													<div class="col-sm-12">Atasament: 
														<div><img src='<?php echo $rand['imagine']?>' height="100"></div>
													</div>
												</div>
											</div>
										<?php
										}
									} else {
											echo 'Error';
									}
								}
								?>
							</div>
							<div class="col-sm-4 text-right">
								<a href="my-news.php">Anunturile mele</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('inc/footer.php'); ?>
<?php include('inc/footer.inc.php'); ?>