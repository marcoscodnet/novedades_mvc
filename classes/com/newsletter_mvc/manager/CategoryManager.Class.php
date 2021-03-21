<?php 

/** 
 * Manager para Category
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class CategoryManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Category $oCategory entity a agregar.
	 */
	public function addCategory(Category $oCategory) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		CategoryDAO::addCategory($oCategory);
	}


	/**
	 * se modifica la entity
	 * @param Category $oCategory entity a modificar.
	 */
	public function updateCategory(Category $oCategory) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		CategoryDAO::updateCategory($oCategory);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteCategory($id) { 
		//TODO validaciones; 

		$oCategory = new Category();
		$oCategory->setCd_category($id);
		CategoryDAO::deleteCategory($oCategory);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Category]
	 */
	public function getCategories(CdtSearchCriteria $oCriteria) { 
		return CategoryDAO::getCategories($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getCategoriesCount(CdtSearchCriteria $oCriteria) { 
		return CategoryDAO::getCategoriesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Category
	 */
	public function getCategory(CdtSearchCriteria $oCriteria) { 
		return CategoryDAO::getCategory($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getCategories($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getCategoriesCount($oCriteria); 
	}


} 
?>
