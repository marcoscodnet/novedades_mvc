<?php 

/** 
 * Manager para Template
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class TemplateManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Template $oTemplate entity a agregar.
	 */
	public function addTemplate(Template $oTemplate) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		TemplateDAO::addTemplate($oTemplate);
	}


	/**
	 * se modifica la entity
	 * @param Template $oTemplate entity a modificar.
	 */
	public function updateTemplate(Template $oTemplate) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		TemplateDAO::updateTemplate($oTemplate);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteTemplate($id) { 
		//TODO validaciones; 

		$oTemplate = new Template();
		$oTemplate->setCd_template($id);
		TemplateDAO::deleteTemplate($oTemplate);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Template]
	 */
	public function getTemplates(CdtSearchCriteria $oCriteria) { 
		return TemplateDAO::getTemplates($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getTemplatesCount(CdtSearchCriteria $oCriteria) { 
		return TemplateDAO::getTemplatesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Template
	 */
	public function getTemplate(CdtSearchCriteria $oCriteria) { 
		return TemplateDAO::getTemplate($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getTemplates($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getTemplatesCount($oCriteria); 
	}


} 
?>
