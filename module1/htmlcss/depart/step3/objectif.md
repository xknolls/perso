# Objectif de l'exercice

## Définir une navigation interne à la page

Une fois installé, le menu doit permettre de faire défiler automatiquement le document (scroll)
afin que le haut du groupe correspondant au lien atteigne le haut de la fenêtre

1. Étape 1 :

  Insérer l'ensemble des éléments HTML introduites par un titre de niveau 2 dans une balise de regroupement <div>
  En veillant à respecter l'indentation du code  

2. Etape 2 :

  Introduire un attribut id permettant d'identifier le groupe de manière unique
  <div id="Identifiant unique">

  L'identifiant ne doit pas comporter d'espaces, ni d'accents
  Veiller à la casse (minuscule recommandée dans un premier temps)

  Liste des groupes :

  * web
  * normalisation
  * webdesign
  * http
  * langages

3. Etape 3 :

  Créer un menu de navigation interne en haut de la page (sous le titre de niveau 1)

  Dans une balise <nav>, insérer 5 liens HTML (1 par groupe)

  * Le texte visible par l'utilsateur doit reprendre le texte du titre du groupe (titre de niveau 2)
  * L'attribut href du lien doit cibler son groupe de la manière suivante :
    #web permet de cibler un élément html de la valeur de l'attribut id=webdesign
    <a href="#web">Qu'est-ce que le web ?</a>

## Pouvoir cibler chaque groupe avec une étiquette unique : l'attribut class

Dans chaque balise de groupe créée, insérer un autre attribut, mais cette fois identique (le même pour chque groupe)

  Exemple : <div id="langages" class="section">

  https://www.alsacreations.com/article/lire/535-quelle-est-la-difference-entre-une-classe-class-et-un-id.html

## Notions abordées au cours de l'exercice

HTML : Définir une navigation interne avec des ancres
HTML : Introduction à la structure d'un document
CSS  :
  * couleur de fond (background-color)
  * Scroll doux
  * Mise en évidence du modèle de boite
  * Balise de type block, balise de type inline
  * Observation à l'inspecteur de code
