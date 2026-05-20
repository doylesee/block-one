		
		<div class="footer-wrapper">
			<div class="row footer">
				<div class="small-12 large-6 columns footer__address">
					<p>206 Welch Avenue, Ames, IA 50014 &nbsp;| &nbsp;(515) 329-0609</p>
				</div>
				<div class="small-12 large-5 columns footer__social-media">
					<?php
						$a_args = array(
							'post_type'			=> 'social-media',
							'orderby'			=> 'menu_order',
							'order'				=> 'ASC',
							'posts_per_page'	=> 3
						);
						$a_posts = get_posts( $a_args );
						
						foreach( $a_posts as $o_post ) {
							$i_post_id = $o_post->ID;
							$logo = get_field('logo',$i_post_id);
					?>
						<div class="footer__social-media-item">
							<a href="<?php echo get_field('link_url',$i_post_id); ?>" target="_blank">
								<img src="<?php echo $logo['sizes']['footer_social_media_item_logo']; ?>" alt="<?php echo $logo['title']; ?>" />
								<span><?php echo get_field('username',$i_post_id); ?></span>
							</a>
						</div>
					<?php 
						}
						wp_reset_postdata();
					?>
				</div>
				<div class="small-12 large-1 columns footer__handicap">
					<img src="<?php bloginfo('template_url'); ?>/img/footer__handicap.png" alt="" />
				</div>
			</div>
		</div>
		
		<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.slicknav.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
	</body>
</html>