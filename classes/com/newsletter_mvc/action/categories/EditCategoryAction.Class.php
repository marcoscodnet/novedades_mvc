<?php 

/**
 * Acción para editar category.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditCategoryAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el category a modificar.
		$oCategory = new Category ( );
		
				
		$oCategory->setCd_category ( CdtUtils::getParamPOST('cd_category') );	
				
		$oCategory->setDs_category ( CdtUtils::getParamPOST('ds_category') );	
		
					
		return $oCategory;
	}
	
		
}
