<?php 

/** 
 * Manager para Status
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class StatusManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Status $oStatus entity a agregar.
	 */
	public function addStatus(Status $oStatus) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		StatusDAO::addStatus($oStatus);
	}


	/**
	 * se modifica la entity
	 * @param Status $oStatus entity a modificar.
	 */
	public function updateStatus(Status $oStatus) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		StatusDAO::updateStatus($oStatus);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteStatus($id) { 
		//TODO validaciones; 

		$oStatus = new Status();
		$oStatus->setCd_status($id);
		StatusDAO::deleteStatus($oStatus);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Status]
	 */
	public function getStates(CdtSearchCriteria $oCriteria) { 
		return StatusDAO::getStates($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getStatesCount(CdtSearchCriteria $oCriteria) { 
		return StatusDAO::getStatesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Status
	 */
	public function getStatus(CdtSearchCriteria $oCriteria) { 
		return StatusDAO::getStatus($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getStates($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getStatesCount($oCriteria); 
	}


} 
?>
