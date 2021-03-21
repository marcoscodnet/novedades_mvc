<?php 

/** 
 * Manager para ImageCategory
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageCategoryManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param ImageCategory $oImageCategory entity a agregar.
	 */
	public function addImageCategory(ImageCategory $oImageCategory) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ImageCategoryDAO::addImageCategory($oImageCategory);
	}


	/**
	 * se modifica la entity
	 * @param ImageCategory $oImageCategory entity a modificar.
	 */
	public function updateImageCategory(ImageCategory $oImageCategory) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ImageCategoryDAO::updateImageCategory($oImageCategory);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteImageCategory($id) { 
		//TODO validaciones; 

		$oImageCategory = new ImageCategory();
		$oImageCategory->setCd_image_category($id);
		ImageCategoryDAO::deleteImageCategory($oImageCategory);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[ImageCategory]
	 */
	public function getImageCategories(CdtSearchCriteria $oCriteria) { 
		return ImageCategoryDAO::getImageCategories($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getImageCategoriesCount(CdtSearchCriteria $oCriteria) { 
		return ImageCategoryDAO::getImageCategoriesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ImageCategory
	 */
	public function getImageCategory(CdtSearchCriteria $oCriteria) { 
		return ImageCategoryDAO::getImageCategory($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getImageCategories($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getImageCategoriesCount($oCriteria); 
	}


} 
?>
