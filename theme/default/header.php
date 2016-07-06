<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php site_info('name'); ?> | <?php site_info('description'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php get_header_default(); ?>
</head>
<body>
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-4">
					<a href="" class="sitename"><i class="icofont icofont-polygonal"></i> <?php site_info('name'); ?></a>
				</div> <!-- /.col-12 -->

				<div class="col-8">
					<ul class="header-nav floatright">
						<li><a href="#"><i class="icofont icofont-user"></i> Welcome <b><?php echo $_SESSION['userid']; ?></b></a></li>
						<li><a href="<?php echo signout_url(); ?>"><i class="icofont icofont-power"></i> sign out</a></li>
					</ul> <!-- /.header-nav -->
				</div> <!-- /.col-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</header> <!-- /#header -->