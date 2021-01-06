# Objectif de l'exercice

Réaliser la page HTML correspond à la maquette fournie (maquette.png)
En structurant le contenu (fourni dans contenus.txt) à l'aide du langage HTML
En vous appuyant sur le mockup (mockup.png)
Sans utiliser le langage CSS : séparation de la structure et de la forme
Sans erreur de syntaxe

## Notions abordées au cours de l'exercice

### Outils

#### Écriture du code : les éditeurs de texte

Un éditeur de texte se distingue d'un traitement de texte par le fait qu'il est orienté lignes de code plutôt que paragraphes, et que les fichiers textes ne contiennent en général pas de mise en forme
Un éditeur de code facilite la lecture de ce dernier grâce à la coloration syntaxique permettant de distinguer les éléments de langage.

  * ATOM : https://atom.io/
  * SublimeText : https://www.sublimetext.com/
  * Bracket : http://brackets.io/
  * Notepad++ : https://notepad-plus-plus.org/downloads/

#### Inspecteur de code : le diagnostic

  1. Outils de développement du navigateur
    Accès depuis le navigateur :
    * CTRL+MAJ+I
    * Clic droit : Examiner l'élément

  2. Extensions du navigateur
    * Web Developer :
    CHROME  -> https://chrome.google.com/webstore/detail/web-developer/bfbameneiokkgbdmiekhjnmfkcnldhhm?hl=fr
    FIREFOX -> https://addons.mozilla.org/fr/firefox/addon/web-developer/


#### Ecriture du code : importance de l'indentaton

  * Importance d'une bonne présentation du code
  * Importance d'un code commenté : les commentaires HTML <!-- Comentaire -->

  https://www.pierre-giraud.com/html-css-apprendre-coder-cours/indentation-commentaire-html/

### Syntaxe HTML

Le rôle des balises est de proposer une syntaxe pour délimiter une séquence de caractères ou pour marquer une position précise dans un flux de caractères.

  * balises
    * balises en paire
    * balises orphelines
  * attributs
    * globaux/universels : possible sur toutes les balises (lang)
    * spécifiques à certaines balises (href, src, ... )

#### Document HTML de base

* balises obligatoires
* balise <head> : son rôle
* introduction au référencement

-> https://developer.mozilla.org/fr/docs/Apprendre/HTML/Comment/Cr%C3%A9er_un_document_HTML_simple

#### Balises de flux usuelles

1. Les titres
  * balises de <h1> à <h6>  -> https://developer.mozilla.org/fr/docs/Web/HTML/Element/Heading_Elements)
  * Le respect de la structure documentaire -> https://www.alsacreations.com/astuce/lire/952-Bien-construire-sa-hierarchie-de-titres.html

2. Les paragraphes
  balise <p> -> https://developer.mozilla.org/fr/docs/Web/HTML/Element/p

3. Le saut de ligne
  * balise <br> -> https://developer.mozilla.org/fr/docs/Web/HTML/Element/br
  * Nota : la balise <br> ne doit pas être utilisée pour augmenter l'espace entre deux lignes

4. Les acronymes
    balise <abbr> -> https://developer.mozilla.org/fr/docs/Web/HTML/Element/abbr

5. Mettre le texte en exergue, donner de l'emphase
    balises : <strong>, <em> -> https://www.alsacreations.com/article/lire/552-strong-b-em-i-quelle-balise-utiliser-et-pourquoi.html

6. Les listes :
  -> https://www.pierre-giraud.com/html-css-apprendre-coder-cours/liste-ul-ol-dl/
  * liste numérotée       <ol></li>
  * liste à puces         <ul></li>
  * liste de définition   <dl><dt></dd>

7. Les liens :
  * balise <a href="">
  * La notion d'URL

8. L'incrustration d'images
    balise : <img src="" alt="">


#### Validation du code HTML

Utilisation du validateur du W3C par l'intermédiaire de l'extension WEB DEVELOPER
https://validator.w3.org/


## Introduction à l'accessibilité

* L'attribut lang
* L'attribut alt

## La notion de flux

Le flux correspond à l'écoulement des informations (ou données) dans le processus d'interprétation des navigateurs.
En toute logique, un navigateur commence par le haut de la page, place les éléments (balises) qu'il rencontre les unes à la suite des autres, de gauche à droite puis de haut en bas, à ceci près que cela dépend si ce sont des balises bloc ou en-ligne

* balise block
* balise inline
