<?php 


$categories = get_categories();
?>
<?php get_header() ?>
<main>
    <?php if (have_posts()) : ?>
        <header class="main-header">
            <?php while (have_posts()) : the_post(); ?>
            <h1 class="animate__animated animate__slideInUp title"><?php the_title() ?></h1>

                <div class="animate__animated animate__slideInDown"><?php the_content() ?></div>

                <a class="header-cta" href="#s1" title="Découvrez les dernières recettes">
                    <i class="fas fa-caret-square-down"></i>
                </a>

            <?php endwhile; ?>
        </header>
    <?php endif; ?>


    <?php foreach($categories as $category) : 
        $query1 = new WP_Query( array(
            'cat' => $category-> cat_ID,
            'posts_per_page' => 3,
        ));
        ?> 
    <section id="s<?= $category -> cat_ID ?>" class="bg-dark">
        <div class="container">
            <h2 class="h2"><?= $category -> name; ?></h2>
            <?php while( $query1 -> have_posts()) :
                $query1 -> the_post();
                get_template_part('template-parts/content', 'archive');
                  ?>
            <?php endwhile; ?>
        </div>
    </section>
    <?php endforeach;?>
</main>
<?php get_footer() ?>