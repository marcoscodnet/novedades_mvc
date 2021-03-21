<?php 

/** 
 * Manager para NewsletterImage
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterImageManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param NewsletterImage $oNewsletterImage entity a agregar.
	 */
	public function addNewsletterImage(NewsletterImage $oNewsletterImage) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		NewsletterImageDAO::addNewsletterImage($oNewsletterImage);
	}


	/**
	 * se modifica la entity
	 * @param NewsletterImage $oNewsletterImage entity a modificar.
	 */
	public function updateNewsletterImage(NewsletterImage $oNewsletterImage) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		NewsletterImageDAO::updateNewsletterImage($oNewsletterImage);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteNewsletterImage($id) { 
		//TODO validaciones; 

		$oNewsletterImage = new NewsletterImage();
		$oNewsletterImage->setCd_newsletter_image($id);
		NewsletterImageDAO::deleteNewsletterImage($oNewsletterImage);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[NewsletterImage]
	 */
	public function getNewsletterImages(CdtSearchCriteria $oCriteria) { 
		return NewsletterImageDAO::getNewsletterImages($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getNewsletterImagesCount(CdtSearchCriteria $oCriteria) { 
		return NewsletterImageDAO::getNewsletterImagesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return NewsletterImage
	 */
	public function getNewsletterImage(CdtSearchCriteria $oCriteria) { 
		return NewsletterImageDAO::getNewsletterImage($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getNewsletterImages($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getNewsletterImagesCount($oCriteria); 
	}


} 
?>
