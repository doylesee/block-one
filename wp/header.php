<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="robots" content="noindex, nofollow" />
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
		<title><?php wp_title(); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/foundation.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slicknav.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />	
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/stylesheet.css" type="text/css" charset="utf-8" />
		
		<script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr.js"></script>
	</head>
	<body>
		<div class="banner">
			<div class="banner__overlay">
				<div class="banner__text">
					<h2>The Opportunities Are Endless at BlockONE!</h2>
					<img src="<?php bloginfo('template_url'); ?>/img/banner__block-logo.png" alt="BlockOne" />
				</div>
			</div>
			
			<div class="row banner__list">
				<?php
					$a_args = array(
						'post_type'			=> 'banner-items',
						'orderby'			=> 'menu_order',
						'order'				=> 'ASC',
						'posts_per_page'	=> 3
					);
					$a_posts = get_posts( $a_args );
					
					foreach( $a_posts as $o_post ) {
						$i_post_id = $o_post->ID;
						$featured_image = get_field('featured_image',$i_post_id);
				?>
					<div class="small-12 column banner__list-item">
						<img src="<?php echo $featured_image['sizes']['banner_list_item_image']; ?>" alt="<?php echo $featured_image['title']; ?>" />
					</div>
				<?php 
					}
					wp_reset_postdata();
				?>
			</div>
			<div class="banner__list-nav">
			</div>
		</div> <!-- close .banner -->