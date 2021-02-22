<?php
/*
    Template Name: Model du formaulaire de contact
*/
?>

<?php get_header() ?>
<main>
	<?php if (have_posts()) : ?>
		<section>
			<div class="container">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/content', 'page') ?>
				<?php endwhile; ?>
			</div>
		</section>
	<?php else : ?>
	<?php endif; ?>

	<?php get_sidebar(); ?>

</main>
<?php get_footer() ?>