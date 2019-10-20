<?php
	require("../req/all/codes.php");
	require("../req/all/api-v1.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
			require("../req/head/head.php"); 
		?>
    </head>
    <body id="bg">
		<?php require("../req/structure/navbar.php"); ?>
		
		<noscript><?php require("../req/structure/js-alert.php"); ?></noscript>
		
		<div id="body-container" class="container">
			<div id="alert-container"><?php require("../req/structure/alert-container.php"); ?></div>
			<div class="card">
				<div class="card-body">
					<?php echo date_default_timezone_get(); ?>
				</div>
			</div>
		</div>
    </body>
</html>
<?php closeLogs(); ?>