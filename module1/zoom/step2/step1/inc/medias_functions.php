<?php

function make_thumbnail($source, $reduction, $destination)
{

	//créer le sous dossier $destination s'il n'existe pas
	if(!is_dir(pathinfo($destination, PATHINFO_DIRNAME))) {
		@mkdir(pathinfo($destination, PATHINFO_DIRNAME));
	}

	//if ( !is_writable($destination) )  //NOTE si le dossier pas accesible
	if(!is_readable(pathinfo($destination, PATHINFO_DIRNAME)))
	{
		echo 'le fichier n\'est pas visible';
		return; //NOTE alors je sort de la fonction
	}

	$ext = strtolower( pathinfo($source, PATHINFO_EXTENSION));

	switch($ext) {
		case 'jpg' :
		case 'jpeg' :
			$resource = imagecreatefromjpeg($source);
		break;
		case 'png' :
			$resource = imagecreatefrompng($source);
		break;
		case 'gif' :
			$resource = imagecreatefromgif($source);
		break;
		case 'webm' :
			$resource = imagecreatefromwebp($source);
		break;
		default :
			copy($source , $destination);
	}

	$width = imagesx($resource); //calcul de la largeur et la hauteur
	$height = imagesx($resource);

	$new_width = $width * $reduction; //calcul des nouvelles dimensions
	$new_height = $height * $reduction;

	$thumbnail = imagecreatetruecolor($new_width, $new_height); //création d'une image noire de la taille souhaitée

	var_dump($thumbnail);

	imagecopyresampled(
		$thumbnail,
		$resource,
		0,
		0,
		0,
		0,
		$new_width,
		$new_height,
		$width,
		$height
	); //création et redimensionnement de la nouvelle image

	//$filename = pathinfo($source, PATHINFO_BASENAME); //on stock le chemin du fichier dans $filename

	switch($ext) { //on télécharge les nouvelles images
		case 'jpg' :
		case 'jpeg' :
			imagejpeg($thumbnail, $destination);
		break;
		case 'png' :
			imagepng($thumbnail, $destination);
		break;
		case 'gif' :
			imagegif($thumbnail, $destination);
		break;
		case 'webm' :
			imagewebp($thumbnail, $destination);
		break;
		default :
			return;
	}
}

function list_directories($path) : array {

	$directories = array();

	if(is_readable($path)) {
		$path_handle = opendir($path);
		while(false !== ($entry = readdir($path_handle))) {
			if(is_dir($path . $entry) && !in_array($entry, array('.', '..'))) {

			}
		}
	}
}