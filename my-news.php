<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-xs-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-xs-12 default-bg padding-bottom-30 cont-style">
                    <div id="breadcrumb" class="col-xs-12 margin-20">
                        ACASA / Anunturile mele
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12">
							<?php
								if (isset($_SESSION['nu'])) {
							?>
                            <h3>Buna, <?php echo $_SESSION['nume'] ?></h3>
							<?php } ?>
                        </div>
						<div class="col-xs-12">
							<?php
							if (!(isset($_SESSION['nu']))) {
								echo '<span class="text-danger">Acces interzis!</span>';
							} else {
								//selectam tot din tabelul Anunturi
								$cerereSQL = 'SELECT id_anunt, titlu_anunt, descriere_anunt, data_anunt, imagine_anunt, nume_util, titlu_categorie, nume_oras, nume_judet FROM anunturi INNER JOIN referinte ON id_anunt = id_anunt_ref AND id_utilizator_ref='.$_SESSION['nu'].' INNER JOIN utilizatori ON id_utilizator_ref = id_util INNER JOIN categorii on id_categorie = id_categorie_ref INNER JOIN orase ON id_oras = id_oras_anunt INNER JOIN judete ON id_judet = id_judet_anunt';
								$rezultat = mysql_query($cerereSQL);
								if ($rezultat != FALSE) {
									while($rand = mysql_fetch_array($rezultat)) {
										?>
										<div class="col-xs-12 col-sm-6 col-md-3">
						                    <div class="news">
						                        <div class="news-image">
						                        	<a href="single-news.php?id=<?php echo $rand['id_anunt'] ?>">
						                        		<img src='<?php echo $rand['imagine_anunt']?>' height="100">
						                        	</a>
													<div class="news-category">Sectiune: <?php echo $rand['titlu_categorie'] ?></div>
						                        </div>
						                        <div class="news-desc">
													<div class="news-date">Data: <?php echo $rand['data_anunt'] ?></div>
													<div class="user-name">Autor: <?php echo $rand['nume_util'] ?></div>
													<div class="news-title"><?php echo $rand['titlu_anunt'] ?></div>
													<div class="news-short-desc col-xs-12"><?php echo $rand['descriere_anunt'] ?></div>
													<div class="news-location"><?php echo $rand['nume_oras'] ?>, <?php echo $rand['nume_judet'] ?></div>
													<a href="edit-news.php?id=<?php echo $rand['id_anunt'] ?>" class="edit-btn"><i class="fa fa-pencil"></i></a>
													<a href="delete-news.php?id=<?php echo $rand['id_anunt'] ?>" class="delete-btn"><i class="fa fa-trash-o"></i></a>
						                        </div>
						                        <a href="single-news.php?id=<?php echo $rand['id_anunt'] ?>" class="more-details"><i class="fa fa-chevron-circle-right"></i></a>
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