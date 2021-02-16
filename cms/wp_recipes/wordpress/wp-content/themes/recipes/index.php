<?php get_header() ?>

<main>
	<?php if (have_posts()) : ?>
		<section>
			<div class="container">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/content','archive') ?>
				<?php endwhile; ?>
			</div>
		</section>
	<?php else : ?>
	<?php endif; ?>
</main>
<?php get_footer() ?>