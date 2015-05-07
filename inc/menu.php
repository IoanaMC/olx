<ul class="nav nav-tabs">
	<li class="col-xs-3 no-padding"><a href="homepage.php">Acasa</a></li>
<?php
	if (isset($_SESSION['nu'])) {
?>
	<li class="col-xs-3 no-padding"><a href="my-news.php">Anunturile mele</a></li>
	<li class="col-xs-3 no-padding"><a href="add-news.php">Adauga anunt nou</a></li>
<?php } ?>
	<li class="col-xs-3 no-padding"><a href="all-news.php">Toate produsele</a></li>
</ul>