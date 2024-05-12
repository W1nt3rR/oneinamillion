<?php get_header(); ?>

<?php
$args = array(
	'post_type' => 'carousel_images',
	'posts_per_page' => -1, // Retrieve all images
	'orderby' => 'menu_order',
	'order' => 'ASC'
);

$carousel_query = new WP_Query($args);
?>

<article class="content">
	<div class='container'>
		<div class="carousel">
			<?php if ($carousel_query->have_posts()) : ?>
				<div class="simple-carousel">
					<?php while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?>
						<?php if (has_post_thumbnail()) : ?>
							<div>
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif;
			wp_reset_postdata(); ?>
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