<?php 

/** 
 * Manager para Item
 *  
 * @author Marcos
 * @since 13/07/2015
 */ 
class ItemManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Item $oItem entity a agregar.
	 */
	public function addItem(Item $oItem) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ItemDAO::addItem($oItem);
	}


	/**
	 * se modifica la entity
	 * @param Item $oItem entity a modificar.
	 */
	public function updateItem(Item $oItem) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ItemDAO::updateItem($oItem);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteItem($id) { 
		//TODO validaciones; 

		$oItem = new Item();
		$oItem->setCd_item($id);
		ItemDAO::deleteItem($oItem);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Item]
	 */
	public function getItems(CdtSearchCriteria $oCriteria) { 
		return ItemDAO::getItems($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getItemsCount(CdtSearchCriteria $oCriteria) { 
		return ItemDAO::getItemsCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Item
	 */
	public function getItem(CdtSearchCriteria $oCriteria) { 
		return ItemDAO::getItem($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getItems($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getItemsCount($oCriteria); 
	}


} 
?>
