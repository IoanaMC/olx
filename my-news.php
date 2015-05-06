<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-sm-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-sm-12 default-bg padding-bottom-30">
                    <div id="breadcrumb" class="col-sm-12 margin-20">
                        ACASA / Produsele mele
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
							<?php
							if (!(isset($_SESSION['nu']))) {
								echo '<span class="text-danger">Acces interzis!</span>';
							} else {
								//selectam tot din tabelul Anunturi
								$cerereSQL = 'SELECT id_anunt, titlu_anunt, descriere_anunt, data_anunt, imagine_anunt, nume_util, titlu_categorie FROM anunturi INNER JOIN referinte ON id_anunt = id_anunt_ref AND id_utilizator_ref='.$_SESSION['nu'].' INNER JOIN utilizatori ON id_utilizator_ref = id_util INNER JOIN categorii on id_categorie = id_categorie_ref';
								$rezultat = mysql_query($cerereSQL);
								if ($rezultat != FALSE) {
									while($rand = mysql_fetch_array($rezultat)) {
										?>
										<div class="col-xs-12 col-sm-6 col-md-3">
						                    <div class="news">
						                        <div class="news-image">
						                        	<img src='<?php echo $rand['imagine_anunt']?>' height="100">
						                        </div>
						                        <div class="news-desc">
													<div class="col-sm-12">Data: <?php echo $rand['data_anunt'] ?></div>
													<div class="col-sm-12">Nume articol: <?php echo $rand['titlu_anunt'] ?></div>
													<div class="col-sm-12">Categorii: <?php echo $rand['titlu_categorie'] ?></div>
													<div class="col-sm-12">Descriere: <?php echo $rand['descriere_anunt'] ?></div>
													<div>
														<a href="edit-news.php?id=<?php echo $rand['id_anunt'] ?>" class="btn btn-primary">Edit</a>
													</div>
						                        </div>
						                        <a href="#" class="more-details">Detalii</a>
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
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('inc/footer.php'); ?>
<?php include('inc/footer.inc.php'); ?>