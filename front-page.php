<?php get_header(); ?>

<article class="content">
	<div class='container'>
		<div class="carousel">

		</div>
	</div>
</article>

<article class="content">
	<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			the_content();
		}
	}
	?>
</article>

<?php get_footer(); ?>