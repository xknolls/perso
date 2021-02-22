<?php 

// requette pour récupérer les articles de la catégorie id_category1
$query1 = new WP_Query( array(
    'cat' => 1,
    'posts_per_page' => 3,
));

?>
<?php get_header() ?>
<main>
    <?php if (have_posts()) : ?>
        <header class="main-header">
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="animateanimated animateslideInUp title"><?php the_title() ?></h1>

                <div class="animateanimated animateslideInDown"><?php the_content() ?></div>

                <a class="header-cta" href="#s1" title="Découvrez les dernières recettes">
                    <i class="fas fa-caret-square-down"></i>
                </a>

            <?php endwhile; ?>
        </header>
    <?php endif; ?>

    <section id="s" class="bg-dark">
        <div class="container">
            <h2 class="h2"></h2>
            <?php while( $query1 -> have_posts()) :
                $query1 -> the_post();
                get_template_part('template-parts/content', 'archive');
                  ?>
            <?php endwhile; ?>
        </div>
    </section>
</main>
<?php get_footer() ?>