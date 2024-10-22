<?php global $zboom_opt; ?>
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php language_attributes() ?>"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo("charset")?>">
	<meta name="description" content="<?php bloginfo( "description" ) ?>">
	<meta name="author" content="Shahidul">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri()) ?>/images/favicon.ico" type="image/x-icon"/>

	<style>
		<?php echo $zboom_opt['custom-css']; ?>
		body {
			background-color: <?php echo $zboom_opt['body-bg']['background-color']; ?> !important;
			background-image: url(<?php echo $zboom_opt['body-bg']['background-image']; ?>) !important;
			background-repeat: <?php echo $zboom_opt['body-bg']['background-repeat']; ?> !important;
			background-attachment: <?php echo $zboom_opt['body-bg']['background-attachment']; ?> !important;
			background-position: <?php echo $zboom_opt['body-bg']['background-position']; ?> !important;
			background-size: <?php echo $zboom_opt['body-bg']['background-size']; ?> !important;
		}
		p {
			color: <?php echo $zboom_opt['default-color']; ?>;
		}
		a {
			color: <?php echo $zboom_opt['link-color']; ?> !important;
		}
		.wrap-header {
			height: <?php echo $zboom_opt['header-dimensions']['height']; ?> !important;
		}
		
	</style>

<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
<!--------------Header--------------->
<header>
	<div class="wrap-header zerogrid">
		<div id="logo"><a href="<?php bloginfo("url") ?>"><img src="<?php echo $zboom_opt['logo-upload']['url']; ?>"/></a></div>
		
		<div id="search">
			<form action="<?php print home_url() ?>" method="get">
				<input type="search" name="s" value="Search..." onfocus="if (this.value == &#39;Search...&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Search...&#39;;}">
				<input type="submit" value="" class="button-search">
			</form>
		</div>
	</div>
</header>

<nav>
	<div class="wrap-nav zerogrid">
		<div class="menu">
			<?php
			if(function_exists("wp_nav_menu")) {
				wp_nav_menu( array(
					"theme_location" => "main-menu"
				));
			}
			?>
		</div>		
	</div>
</nav>
