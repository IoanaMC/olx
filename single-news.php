<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-sm-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-sm-12 default-bg padding-bottom-30 clearfix">
                    <div id="breadcrumb" class="col-sm-12 margin-20">
                        ACASA / Anunt
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
								$cerereEditNews = 'SELECT titlu_anunt, descriere_anunt, data_anunt, imagine_anunt, nume_util, titlu_categorie, id_oras, nume_oras, id_judet, nume_judet FROM anunturi INNER JOIN referinte ON id_anunt = id_anunt_ref INNER JOIN utilizatori ON id_utilizator_ref = id_util INNER JOIN categorii on id_categorie = id_categorie_ref INNER JOIN orase ON id_oras = id_oras_anunt INNER JOIN judete ON id_judet = id_judet_anunt WHERE id_anunt='.$_GET["id"];
								$result = mysql_query($cerereEditNews);
								if ($result != FALSE) {
									//if (mysql_num_rows($result) == 1) {
										$rand = mysql_fetch_array($result);
								?>
				                    <div class="single-news">
				                        <div class="news-desc">
					                        <div class="news-image">
					                        	<img src='<?php echo $rand['imagine_anunt']?>' height="100">
					                        </div>
											<div class="news-date">Data: <?php echo $rand['data_anunt'] ?></div>
											<div class="user-name">Autor: <?php echo $rand['nume_util'] ?></div>
											<div class="news-category">Categorii: <?php echo $rand['titlu_categorie'] ?></div>
											<div class="news-title"><?php echo $rand['titlu_anunt'] ?></div>
											<div class="col-sm-12"><?php echo $rand['descriere_anunt'] ?></div>
											<div class="news-location"><?php echo $rand['nume_oras'] ?>, <?php echo $rand['nume_judet'] ?></div>
											<a href="edit-news.php?id=<?php echo $rand['id_anunt'] ?>" class="edit-btn"><i class="fa fa-pencil"></i></a>
				                        </div>
				                        <a href="all-news.php" class="more-details"><i class="fa fa-chevron-circle-left"></i></a>
				                    </div>
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