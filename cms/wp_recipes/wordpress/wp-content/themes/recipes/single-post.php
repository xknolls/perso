<?php get_header() ?>

<main>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php
			$postformat = get_post_format();
			get_template_part('template-parts/content', $postformat)
			?>
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
</main>
<?php get_footer() ?>