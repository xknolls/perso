<?php get_header() ?>

		<main>

		<?php if (have_posts()) : ?>
		<!-- Si j'ai des Posts, j'affiche cette partie -->
		<?php while (have_posts()) : the_post(); ?>
		<!-- Pour CHAQUE Post, j'affiche ça -->

		<article class="section-article" itemscope itemtype="https://schema.org/Recipe">
			<?php
				$categories = get_the_category();
				$first_cat = $categories[0];
			?>
         <header>
            <a itemprop="url" class="container-thumbnail" href="<?php the_permalink() ?>">
               <?php the_post_thumbnail('medium') ?>
            </a>
            <h3 itemprop="name"><?php the_title() ?></h3>
            <meta itemprop="recipeCategory" content="<?php echo $first_cat -> cat_name; ?>" >
            <meta itemprop="cookTime" content="<?php the_field('cooking_time') ?>" >
				<?php the_category(); ?>
            </header>
            <div itemprop="description" class="description">
					<?php the_content() ?>
            </div>
            <footer>
              	<p>Publiée le <time itemprop="datePublished" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('j F Y') ?></time> par <span itemprop="author"><?php the_author() ?></span></p>
              <a itemprop="url" href="<?php the_permalink() ?>" class="cta">Lire la suite</a>
            </footer>
          </article>

		<?php endwhile; ?>
		<?php else : ?>
		<!-- Si il n'y a pas de Post, j'affiche cette partie -->
		<?php endif; ?>

		</main>
		<?php get_footer()?>
