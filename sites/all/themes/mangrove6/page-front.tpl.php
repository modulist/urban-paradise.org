<?php
//print_r($variables);die();
// see: http://drupal.org/node/226776
//print_r($id);echo "|\n";print_r($zebra);echo "|\n";print_r($directory);echo "|\n";print_r($is_admin);echo "|\n";print_r($is_front);echo "|\n";
//print_r($logged_in);echo "|\n";print_r($db_is_active);echo "|\n";print_r($user);echo "|\n";die();
// $Id: page.tpl.php,v 1.18 2008/01/24 09:42:53 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
  <!-- page-front.tpl -->
    <title><?php print $head_title ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>

<link rel="stylesheet" href="<?php print $directory ?>/styles/sIFR-screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php print $directory ?>/styles/sIFR-print.css" type="text/css" media="print" />

<!--[if lt IE 7]>
<?php print phptemplate_get_ie_styles(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo $directory ?>/styles_ie6.css" />
<script src="<?php echo base_path() .$directory ?>/scripts/pngfix.js" defer type="text/javascript"></script>
<![endif]-->

</head>
<body class="<?php print $body_classes; ?>">
<div class="page">
	<!-- start top bar -->
		<div id="topbar">
			<div id="logo"><a href="<?php print check_url($front_page) ?>" title="<?php print $site_title ?>"><img src="<?php print check_url($logo) ?>" alt="<?php print $site_title ?>" /></a></div>	
		</div>
		<!-- end top bar -->
	
		<!-- start header -->
		<div id="header">
			<?php print $header;?>
		</div>
		<!-- end header -->
		
		<div id="container" class="clear-block">
			<div class="columns-wrapper">
				<!-- start left column -->
					<div id="sidebar-left" class="column side-column">
						<div class="squeeze"> 
						<?php print (($left)?$left:"<!-- emtpy -->&nbsp;");  ?> </div>
					</div>
				<!-- end left column -->
				<!-- start main column -->
					<div id="main">
						<div id="squeeze" class="squeeze">
							<?php if ($breadcrumb){	print strtolower(substr_replace($breadcrumb,($breadcrumb?'&nbsp;&rsaquo;&nbsp;':"").$title."</div>",-6)); }?>
							<?php if ($title) { ?><h1 class="title" ><?php print $title; ?></h1><?php } ?>
							<?php if ($tabs){ ?><div class="tabs"><ul class="primary"><?php print $tabs; ?></ul></div><?php } ?>
							<?php if ($mission){ ?><div id="mission"><?php print $mission; ?></div><?php } ?>
							<?php print $help; ?><?php print $messages; ?>
							<?php print $content; ?>
							<?php print $feed_icons; ?>
						</div>
					</div>
				<!-- /squeeze /main -->
				<!-- start right column -->
				<?php if ($right)
				{ ?>
						<div id="sidebar-right" class="column side-column">
							<div class="squeeze"> 
							<?php print $right; ?> </div>
						</div>
				<?php }
				else {
				// remove this else part and the main class definition 
				// if you want the main column to stretch when there is no right column content
				 ?>
						<div id="sidebar-right" class="column"> 
							<div class="squeeze">
								<?php print (($right)?$right:"<!-- emtpy -->&nbsp;");  ?> 
							</div>
						</div>
				<?php } ?>
				<!-- /sidebar-right -->
				<br class="clear-both" />
			</div>
			<div id="footer-wrapper"><?php print $footer_message. $footer; ?></div>
		<!-- /footer -->
		</div>
		<!-- /container -->
		<?php print $closure; ?>
	</div>
<!-- /page -->
</body>
</html>
<?php print $scripts; ?>
<script  type="text/javascript">var path_to_theme = '<?php echo base_path() . path_to_theme() ?>';</script>
<script src="<?php print $directory ?>/scripts/sifr.js" type="text/javascript"></script>
<script src="<?php print $directory ?>/scripts/sifr-config.js" type="text/javascript"></script>
