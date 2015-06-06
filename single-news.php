<?php include('inc/header.inc.php'); ?>
<?php include('inc/header.php'); ?>

    <div class="col-xs-12">
        <div class="container">
            <div class="row">
                <?php include('inc/menu.php'); ?>
                <div class="col-xs-12 default-bg padding-bottom-30 clearfix cont-style">
                    <div id="breadcrumb" class="col-xs-12 margin-20">
                        ACASA / Anunt
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
							// if (!(isset($_SESSION['nu']))) {
							// 	echo '<span class="text-danger">Acces interzis!</span>';
							// } else {
								$cerereEditNews = 'SELECT titlu_anunt, descriere_anunt, data_anunt, imagine_anunt, nume_util, telefon_util, titlu_categorie, id_oras, nume_oras, longitudine, latitudine, id_judet, nume_judet FROM anunturi INNER JOIN referinte ON id_anunt = id_anunt_ref INNER JOIN utilizatori ON id_utilizator_ref = id_util INNER JOIN categorii on id_categorie = id_categorie_ref INNER JOIN orase ON id_oras = id_oras_anunt INNER JOIN judete ON id_judet = id_judet_anunt WHERE id_anunt='.$_GET["id"];
								$result = mysql_query($cerereEditNews);
								if ($result != FALSE) {
									//if (mysql_num_rows($result) == 1) {
										$rand = mysql_fetch_array($result);
								?>
				                    <div class="single-news">
				                        <div class="news-desc">
											<span class="news-date">Data: <?php echo $rand['data_anunt'] ?></span>
											<span class="user-name">Autor: <?php echo $rand['nume_util'] ?>/<?php echo $rand['telefon_util'] ?></span>
					                        <div class="news-image">
					                        	<img src='<?php echo $rand['imagine_anunt']?>' height="100">
					                        </div>
											<div class="news-category">Sectiune: <?php echo $rand['titlu_categorie'] ?></div>
											<div class="news-title"><?php echo $rand['titlu_anunt'] ?></div>
											<div class="news-location"><?php echo $rand['nume_oras'] ?>, <?php echo $rand['nume_judet'] ?></div>
											<div class="news-desc"><?php echo $rand['descriere_anunt'] ?></div>
											<div class="news-map">
												<div id="map2" style="height:400px;"></div>
												<input type="hidden" value="<?php echo $rand['longitudine'] ?>" id="longitudine">
												<input type="hidden" value="<?php echo $rand['latitudine'] ?>" id="latitudine">
											</div>
				                        </div>
				                        <a href="all-news.php" class="more-details"><i class="fa fa-chevron-circle-left"></i></a>
				                    </div>
								<?php
									//}
								// }
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

<script type="text/javascript">
var longitudine = $('#longitudine').val();
var latitudine = $('#latitudine').val();

function initialize() {
  var myLatlng = new google.maps.LatLng(longitudine,latitudine);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map2'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>