<?php
require_once __DIR__ .'/medias_functions.php';
//script qui lis un dossier en fonction avec dossier en parametre
//make thumbnails + lecture dossier (on peu mettre ou on veux)

/**
 * make_thumbnail
 *
 * @param  mixed $source
 * @param  mixed $reduction
 * @param  mixed $destination
 * @return void
 */

function lazyGallery($path)
{
	$lazy_gallery = array(); //tableau dans lequel seront stocké le nom des photos à afficher
	$exts_granted = array('jpg', 'jpeg', 'png', 'gif', 'webm', 'svg'); //extensions autorisées
	$path_thumbnails = $path . '/thumbnails/';

	//if( $dir_handle = opendir('./img')) { //la variable contient l'ouverture du dossier
	if (is_readable($path)) {

		$dir_handle = opendir($path);

		while (false !== ($entry = readdir($dir_handle))) {
			//var_dump($entry);
			$ext = pathinfo($entry, PATHINFO_EXTENSION);
			$ext = strtolower($ext);


			if (in_array($ext, $exts_granted)) {
				//$lazy_gallery[] = $entry; //nom des fichiers à afficher

				$alt = ucfirst(pathinfo($entry, PATHINFO_FILENAME)); //majuscule a la premiere lettre & que le nom du fichier
				$alt = strstr($alt, '_', true); //supprime tout les caractere apres le _

				if (!file_exists($path_thumbnails . $entry)) {
					make_thumbnail($path . $entry, 0.75, $path_thumbnails . $entry);
				}

				$lazy_gallery[] = array(
					'src' 				=> $entry,
					'src_thumbnails' 	=> $path_thumbnails . $entry,
					'alt' 				=> $alt,
				);
			}
		}
	}
}