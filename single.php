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

	<?php $next_post = mod_get_adjacent_post( 'prev', 'projects' ); ?>
	<?php if ( is_a( $next_post, 'WP_Post' ) ) {  ?>
		<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
	<?php } ?>

<?php endwhile; else : ?>
	<div class="u-container">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
