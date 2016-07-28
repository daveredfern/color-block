<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="u-container u-section-end u-center">
		<div class="u-section">
			<h1 class="main-title"><?php the_title(); ?></h1>
		</div>
		<?php the_content(); ?>
	</div>
<?php endwhile; else : ?>
	<div class="u-container u-center">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
