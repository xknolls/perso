<?php 

setcookie('pseudo','Milka', time() + 24*3600);

setcookie('firstname', 'Huguette', time() + 365*24*3600, null, null, false, true);

$class = 'light';

/*if(array_key_exists('theme',$_COOKIE)) {
    $class = htmlspecialchars($_COOKIE['theme']);
}
else {
    $class = 'light';
}*/

//Ecriture ternaire : la mêùe chose que le teste précédent en condensé
$class = array_key_exists('class',$_COOKIE) ? htmlspecialchars_decode($_COOKIE['class']) : 'light';


if(
    array_key_exists('theme',$_POST) 
    && ($_POST['theme'] == 'dark' OR $_POST['theme'] == 'light')
) {   
    $class = $_POST['theme'];
    setcookie('theme', $class, time()+ 365*24*3600, null, null, false, true);
}
 

include 'index.phtml';