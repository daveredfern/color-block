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

<div class="u-container">
	<h2>Contact me</h2>
	<nav class="nav">
		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '', 'menu_id' => '' ) ); ?>
	</nav>
</div>

<?php get_footer(); ?>
