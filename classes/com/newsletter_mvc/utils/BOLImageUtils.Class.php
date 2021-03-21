<?php

/**
 * Utilidades para el tratamiento de imágenes.
 * 
 * @author Marcos
 * @since 20-02-2014
 */
class BOLImageUtils{
	
		
	public static function uploadImage($nombre_archivo_origen, $nombre_archivo_destino, $path_img_servidor,  $max_width=null){
			
		$destino = $path_img_servidor.$nombre_archivo_destino;
		
		$result=@move_uploaded_file($nombre_archivo_origen, $destino);
					
		//si se define un ancho máximo, se redefine el tamaño de la imagen.
		if($result && $max_width!=null)
			BOLImageUtils::resizeImage($destino,$max_width);
			
		return $result;
	
	}
	
	public static function resizeImage($url_img, $new_width=null){
		
		
		$data = getimagesize($url_img);
		if($data[2]==1){$image = @imagecreatefromgif($url_img);}
		if($data[2]==2){$image = @imagecreatefromjpeg($url_img);}
		if($data[2]==3){$image = @imagecreatefrompng($url_img);} 
			
		// Obtengo ancho y alto orginal
		$width = imagesx($image);
		$height = imagesy($image);

		if($new_width!=null){
		   	
		    $new_height = $height * ($new_width/$width);
		
		    // Redimensiono
		    $image_resized = imagecreatetruecolor($new_width, $new_height);
		    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			if($data[2]==1){imagegif($image_resized, $url_img);}
			if($data[2]==2){imagejpeg($image_resized, $url_img, 75);}
			if($data[2]==3){imagepng($image_resized, $url_img); }
		}			
	}

	
}
