<?php
	require_once('config.php');
?>

<div class="col-sm-12">
	<div class="row">
		<div class="primary-bg topHeader">
			<div class="banner-glow padding-5">
				<div class="container">
					<div class="row">
						<?php if (!(isset($_SESSION['nu']))) { /*daca userul nu e logat*/ ?>
							<div class="col-sm-8"></div>
							<div class="col-sm-2 text-right account"><a href="login.php">Intra in cont</a></div>
							<div class="col-sm-2 text-right account"><a href="create-account.php">Cont nou</a></div>
						<?php } else { ?>
							<div class="col-sm-10"></div>
							<div class="col-sm-2 text-right account"><a href="logout.php">Iesire</a></div>
						<?php } ?>
					</div>
					<div class="row col-sm-12">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<h1 class="text-bold">Anunturi Vanzari</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>