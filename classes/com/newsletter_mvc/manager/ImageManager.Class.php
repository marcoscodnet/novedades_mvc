<?php 

/** 
 * Manager para Image
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Image $oImage entity a agregar.
	 */
	public function addImage(Image $oImage) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ImageDAO::addImage($oImage);
	}


	/**
	 * se modifica la entity
	 * @param Image $oImage entity a modificar.
	 */
	public function updateImage(Image $oImage) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ImageDAO::updateImage($oImage);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteImage($id) { 
		//TODO validaciones; 

		$oImage = new Image();
		$oImage->setCd_image($id);
		ImageDAO::deleteImage($oImage);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Image]
	 */
	public function getImages(CdtSearchCriteria $oCriteria) { 
		return ImageDAO::getImages($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getImagesCount(CdtSearchCriteria $oCriteria) { 
		return ImageDAO::getImagesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Image
	 */
	public function getImage(CdtSearchCriteria $oCriteria) { 
		return ImageDAO::getImage($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getImages($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getImagesCount($oCriteria); 
	}


} 
?>
