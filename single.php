<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="u-section u-container u-container--lg u-center">
		<h1 class="main-title"><?php the_title(); ?></h1>
	</div>

	<?php
		if( have_rows('portfolio_blocks') ):
			while ( have_rows('portfolio_blocks') ) : the_row();
	?>
		<?php if( get_row_layout() == 'portfolio_block_text' ): ?>
			<?php $margin = get_sub_field('remove_margin'); ?>
			<div class="u-clearfix<?php if( $margin[0] != 'Yes') : ?> u-section<?php endif; ?> portfolio-box" style="background-color: <?php the_sub_field('portfolio_background_color'); ?>">
				<div class="u-container u-text-center u-center" style="color: <?php the_sub_field('portfolio_text_color'); ?>">
					<div class="lead">
						<?php the_sub_field('portfolio_text'); ?>
					</div>
				</div>
			</div>
		<?php elseif( get_row_layout() == 'portfolio_block_image' ): ?>
			<div class="u-clearfix<?php if(get_sub_field('remove_margin') != 'yes') : ?> u-section<?php endif; ?> portfolio-box" style="background-color: <?php the_sub_field('portfolio_background_color'); ?>">
				<div class="u-container-lg u-center">
					<?php
						$image = get_sub_field('portfolio_image');
					?>
					<img src="<?php echo $image['url']; ?>" />
					<?php
						unset($image);
					?>
				</div>
			</div>
		<?php endif; ?>
	<?php
			endwhile;
		endif;
	?>

	<?php
		$thisDate = get_the_time('Gisdmy');

		$args = array (
			'post_type' => array( 'projects' ),
		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				if($thisDate < get_the_time('Gisdmy') && $next !== 1) :
					?>
						<div class="next-post">
							<div class="u-container-wide u-section">
								<p>Next</p>
								<h2 class="main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
						</div>
					<?php
					$next = 1;
				endif;
			endwhile;
			/* Restore original Post Data */
			wp_reset_postdata();
		endif;
	?>

<?php endwhile; else : ?>
	<div class="u-container">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
