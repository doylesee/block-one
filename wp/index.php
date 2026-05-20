<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="page-content-wrapper">
			<div class="row">
				<div class="small-12 medium-10 medium-offset-1 end column">
				
					<div class="page-content">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div><!-- close .page-content -->
					
					<div class="student-apartments">
						<?php
							$a_args = array(
								'post_type'			=> 'student-apartments',
								'orderby'			=> 'menu_order',
								'order'				=> 'ASC',
								'posts_per_page'	=> -1
							);
							$a_posts = get_posts( $a_args );
							
							foreach( $a_posts as $o_post ) {
								$i_post_id = $o_post->ID;
								$logo = get_field('logo',$i_post_id);
						?>
							<div class="small-12 columns student-apartments__item">
								<a href="<?php echo get_field('page_link',$i_post_id); ?>" target="_blank">
									<img src="<?php echo $logo['sizes']['student_apartments_item_logo']; ?>" alt="<?php echo $logo['title']; ?>" />
									<h2><?php echo $o_post->post_title; ?></h2>
								</a>
							</div>
						<?php 
							}
							wp_reset_postdata();
						?>
					</div> <!-- close .student-apartments -->
					
					<div class="additional-info">
						<div class="small-12 column">
							<?php echo get_field('additional_info'); ?>
						</div>
					</div> <!-- close .additional-info -->
					
				</div>
			</div> 			
		</div> <!-- close .page-content-wrapper -->
		
	<?php endwhile; else: ?>
	<?php endif; ?>
	
<?php get_footer(); ?>