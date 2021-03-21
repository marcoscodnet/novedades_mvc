<?php 

/**
 * Acción para editar contactCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditContactCategoryAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contactCategory a modificar.
		$oContactCategory = new ContactCategory ( );
		
				
		$oContactCategory->setCd_contact_category ( CdtUtils::getParamPOST('cd_contact_category') );	
				
		$oContactCategory->setCd_contact ( CdtUtils::getParamPOST('cd_contact') );	
				
		$oContactCategory->setCd_category ( CdtUtils::getParamPOST('cd_category') );	
		
					
		return $oContactCategory;
	}
	
		
}
