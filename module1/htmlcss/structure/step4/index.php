<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Les recettes de Tante Huguette</title>
  <meta name="description" conrtent="Délicieuses rectees culinaires à l'ancienne et à petits prix">
<?php include('include/head.php');?>
</head>

  <body class=home>


    <?php include('include/header.php');?>

    <!-- Contenu spécifique à chaque page -->
    <main>
      <!-- En-tête de la page -->
      <header class="main-header">
        <h1>Les dernières merveilles culinaires</h1>
        <p>A vos fourneaux !</p>
        <a class="arrow-down" href="#s1" tilte="Découvrez les dernières recettes">
        <i class="fas fa-arrow-down" aria-hidden="true"></i></a>
      </header>

      <div class="linear-gradient">

        <section id="s1" class="bg-dark">

          <div class="container">

            <h2 class="h2">Recettes salées</h2>
            
            <article itemscope itemtype="https://schema.org/Recipe">

              <header>
                <a itemprop="url" class="container-thumbnail" href="article.php"><img itemprop="image" src="img/crevette_768.jpg" alt="Illustration du plat."></a>
                <h3 itemprop="name">Crevettes à la bisque de homard relevée</h3>
                <meta itemprop="recipeCategory" content="Recettes salées">
                <meta itemprop="prepTime" content="PT30M">
                <meta itemprop="cookTime" content="PT15M">
              </header>
              
              <div itemprop="description" class="description">
                <p>Recette Crevettes à la bisque de homard relevée : découvrez les ingrédients, ustensiles et étapes de préparation.</p>
              </div>
              
              <footer class="footer-article">
                <p>Publié le <time datetime="2020-12-04">4 décembre 2020</time> par <span itemprop="author">Knolls</p>
                <a class="bouton" itemprop="url" href="article.php">Lire la suite</a> 
              </footer>

            </article>
            
            <article itemscope itemtype="https://schema.org/Recipe">

              <header>
                <a itemprop="url" class="container-thumbnail" href="article.php"><img itemprop="image" src="img/fleurs-de-courgettes_768.jpg" alt="Illustration du plat."></a>
                <h3 itemprop="name">Fleurs de courgettes farcies à la ricotta</h3>
                <meta itemprop="recipeCategory" content="Recettes salées">
                <meta itemprop="prepTime" content="PT55M">
                <meta itemprop="cookTime" content="PT30M">
              </header>
              
              <div itemprop="description" class="description">
                <p>La cuisine provençale est riche en couleurs et en saveurs… Découvrez notre recette de fleurs de courgettes facile à préparer et très gourmande, pour régaler vos convives ! Un délice pour toute la famille !</p>
              </div>

              <footer class="footer-article">
                <p>Publié le <time datetime="2020-12-04">4 décembre 2020</time> par <span itemprop="author">Nuage</p>
                <a class="bouton" itemprop="url" href="article.php">Lire la suite</a>
              </footer>

            </article>

            <article itemscope itemtype="https://schema.org/Recipe">

              <header>
                <a itemprop="url" class="container-thumbnail" href="article.php"><img itemprop="image" src="img/roti_768.jpg" alt="Illustration du plat."></a>
                <h3 itemprop="name">Rôti de porc Orloff</h3>
                <meta itemprop="recipeCategory" content="Recettes salées">
                <meta itemprop="prepTime" content="PT2H">
                <meta itemprop="cookTime" content="PT30M">
              </header>
              
              <div itemprop="description" class="description">
                <p>Profitez de ce rôti de porc façon Orloff facile et rapide à faire sans hypothéquer votre maison.</p>
              </div>

              <footer class="footer-article">
                <p>Publié le <time datetime="2020-12-04">4 décembre 2020</time> par <span itemprop="author">Christopher</p>
                <a class="bouton" itemprop="url" href="article.php">Lire la suite</a>
              </footer>

            </article>
          </div>
        </section>

        <section class="bg-light">

          <div class="container">

            <h2 class="h2">Recettes sucrées</h2>

            <article itemscope itemtype="https://schema.org/Recipe">

              <header>
                <a itemprop="url" class="container-thumbnail" href="article.php"><img itemprop="image" src="img/fondant-chocolat_768.jpg" alt="Illustration du plat."></a>
                <h3 itemprop="name">Fondant au chocolat</h3>
                <meta itemprop="recipeCategory" content="Recettes sucrées">
                <meta itemprop="prepTime" content="PT10M">
                <meta itemprop="cookTime" content="PT30M">
              </header>

              
              <div itemprop="description" class="description">
              <p>Fondant au chocolat : Découvrez les ingrédients et étapes de préparation.</p>
              </div>

              <footer class="footer-article">
                <p>Publié le <time datetime="2020-12-04">4 décembre 2020</time> par <span itemprop="author">Mayantis</p>
                <a class="bouton" itemprop="url" href="article.php">Lire la suite</a>
              </footer>
              
            </article>
            
            <article itemscope itemtype="https://schema.org/Recipe">

              <header>
                <a itemprop="url" class="container-thumbnail" href="article.php"><img itemprop="image" src="img/gateau-anniversaire-chocolat_768.jpg" alt="Illustration du plat."></a>
                <h3 itemprop="name">Gâteau d'anniversaire au chocolat à étages</h3>
                <meta itemprop="recipeCategory" content="Recettes sucrées">
                <meta itemprop="prepTime" content="PT2H">
                <meta itemprop="cookTime" content="PT45M">
              </header>
              
              <div itemprop="description" class="description">
                <p>Gâteau à étages coeur de framboise sur ganache de chocolat blanc aux 2 citrons, recouverts d’un glaçage au chocolat</p>
              </div>

              <footer class="footer-article">
                <p>Publié le <time datetime="2020-12-04">4 décembre 2020</time> par <span itemprop="author">Vero</p>
                <a class="bouton" itemprop="url" href="article.php">Lire la suite</a>
              </footer>
            
            </article>

            <article itemscope itemtype="https://schema.org/Recipe">

              <header>
                <a itemprop="url" class="container-thumbnail" href="article.php"><img itemprop="image" src="img/Tarte_aux_pommes_768.jpg" alt="Illustation du plat."></a>
                <h3 itemprop="name">Tarte aux pommes à l'Alsacienne</h3>
                <meta itemprop="recipeCategory" content="Recettes sucrées">
                <meta itemprop="prepTime" content="PT2H">
                <meta itemprop="cookTime" content="PT50M">
              </header>

              <div itemprop="description" class="description">           
                <p>Dés la sortie du four, une odeur de pomme devrait embaumer toute la pièce, découvrez les ingrédients et étapes de préparation.</p>
              </div>

              <footer class="footer-article">
                <p>Publié le <time datetime="2020-12-04">4 décembre 2020</time> par <span itemprop="author">MisterSCO</p>
                <a class="bouton" itemprop="url" href="article.php">Lire la suite</a>
              </footer>
            
            </article>
          </div>
        </section>
      </div>
    </main>

    <?php include('include/footer.php');?>

  </body>
</html>
