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
	<p>For a quick response I recommend tweeting me. For a more indepth conversation feel free to send an email.</p>
	<ul>
		<li><a href="https://www.twitter.com/daveredfern">@daveredfern</a></li>
		<li><a href="mailto:dave@daveredfern.com">dave@daveredfern.com</a></li>
		<li><a href="https://github.com/daveredfern">Github</a></li>
		<li><a href="https://uk.linkedin.com/in/daveredfern">LinkedIn</a></li>
	</ul>
</div>

<?php get_footer(); ?>
