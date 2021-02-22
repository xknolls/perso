<?php
$categories = get_the_category();
$first_cat = $categories[0];
?>

<article class="article-container">
    <header class="article-header">
        <h1 class="h1 article-title" itemprop="name"><?php the_title() ?></h1>
        <?php the_excerpt() ?>
        <dl class="article-metas">
            <dt>Temps</dt>
            <dd><?php the_field('cooking_time') ?></dd>
        </dl>
        <dl class="article-metas">
            <dt>Personnes</dt>
            <dd><?php the_field('persons') ?></dd>
        </dl>
        <dl class="article-metas">
            <dt>Facile</dt>
            <dd><?php the_field('level') ?></dd>
        </dl>
        <dl class="article-metas">
            <dt>Bon marché</dt>
            <dd><?php the_field('cost') ?></dd>
        </dl>
    </header>


    <div itemprop="url" class="article-picture" href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('large') ?>
    </div>


    <section class="article-ingredient">
        <h2 class="h3">Ingrédients</h2>
        <?php the_field('ingredients') ?>
    </section>

    <section class="article-preparation">
        <h2 class="h3">Etapes de préparation</h2>
        <?php the_content('', true) ?>
    </section>

    <aside class="article-aside">
        <h2 class="h3">Astuces & conseils</h2>
        <?php the_field('advices') ?>
    </aside>

    </arcitcle>