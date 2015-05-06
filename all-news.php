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
									$cerereSQL = 'SELECT a.id, a.titlu, a.descriere, a.data, a.imagine, u.nume, c.titlu FROM anunturi a INNER JOIN referinte r ON a.id = r.id_anunt INNER JOIN utilizator u ON r.id_utilizator = u.id INNER JOIN categorie c on c.id_categorie = r.id_categorie';
									$rezultat = mysql_query($cerereSQL);
									if ($rezultat != FALSE) {
										while($rand = mysql_fetch_array($rezultat)) {
											?>
											<div class="col-sm-12 margin-bottom-10 secondary-bg no-padding">
												<div class="col-sm-12 padding-10">
													<div class="col-sm-12">Data: <?php echo $rand['data'] ?></div>
													<div class="col-sm-12">Nume: <?php echo $rand['nume'] ?></div>
													<div class="col-sm-12">Nume articol: <?php echo $rand[2] ?></div>
													<div class="col-sm-12">Categorii: <?php echo $rand['titlu'] ?></div>
													<div class="col-sm-12">Descriere: <?php echo $rand['descriere'] ?></div>
													<div class="col-sm-12">Atasament: 
														<div><img src='<?php echo $rand['imagine']?>' height="100"></div>
													</div>
													<div>
														<a href="edit-news.php?id=<?php echo $rand['id'] ?>" class="btn btn-primary">Edit</a>
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