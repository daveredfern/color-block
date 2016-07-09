<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="u-section">
		<div class="welcome">
			<div class="welcome__header">
				<div class="logo">
					<span>K</span>
					<span>a</span>
					<span>r</span>
					<span>e</span>
					<span>n</span>
				</div>
			</div>
			<div class="welcome__body">
				<div class="u-container u-container--lg">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else : ?>
	<div class="u-container u-section">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
<?php endif; ?>


<div class="u-section">
	<?php
		$args = array(
			'post_type' => 'projects',
			'posts_per_page' => -1,
		);
		$projects = new WP_Query( $args );
		if ( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post();

		$featured_background_color = get_field('featured_background_color');
		$featured_background_image = get_field('featured_background_image');
		$featured_foreground_image = get_field('featured_foreground_image');

		unset($inline_css);
		if($featured_background_color) {
			$inline_css = 'background-color:' . $featured_background_color . ';';
		}
		if($featured_background_image) {
			$inline_css = 'background-image: url(' . $featured_background_image['url'] . ');';
		}
	?>

	<div class="project"<?php if($inline_css) { echo ' style="' . $inline_css . '"'; }; ?>>
		<?php if($featured_foreground_image) : ?>
			<img src="<?php echo $featured_foreground_image['url']; ?>" alt="<?php the_title(); ?>" />
		<?php endif; ?>
	</div>

	<?php
		endwhile; endif;
		wp_reset_query();
	?>
</div>


<?php get_footer(); ?>
