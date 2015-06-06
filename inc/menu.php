<ul class="nav nav-tabs">
	<li class="col-xs-3 no-padding"><a href="homepage.php"><span class="hide-mobile">Acasa</span><span class="hide-desktop"><i class="fa fa-home"></i></span></a></li>
<?php
	if (isset($_SESSION['nu'])) {
?>
	<li class="col-xs-3 no-padding"><a href="my-news.php"><span class="hide-mobile">Anunturile mele</span><span class="hide-desktop"><i class="fa fa-star"></i></span></a></li>
	<li class="col-xs-3 no-padding"><a href="add-news.php"><span class="hide-mobile">Adauga anunt nou</span><span class="hide-desktop"><i class="fa fa-plus"></i></span></a></li>
<?php } ?>
	<li class="col-xs-3 no-padding"><a href="all-news.php"><span class="hide-mobile">Toate anunturile</span><span class="hide-desktop"><i class="fa fa-list"></i></span></a></li>
</ul>