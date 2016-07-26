<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="u-container u-section">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>

	<?php
		if( have_rows('portfolio_blocks') ):
			while ( have_rows('portfolio_blocks') ) : the_row();
	?>
		<?php if( get_row_layout() == 'portfolio_block_text' ): ?>


		<?php elseif( get_row_layout() == 'portfolio_block_image' ): ?>
			<div class="u-container u-section" style="background-color: <?php the_sub_field('portfolio_background_color'); ?>">
				<?php
					$image = get_sub_field('portfolio_image');
					print_r($image);
				?>
				<img src="<?php echo $image['url']; ?>" />
				<?php
					unset($image);
				?>
			</div>
		<?php endif; ?>
	<?php
			endwhile;
		endif;
	?>

<?php endwhile; else : ?>
	<div class="u-container">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
