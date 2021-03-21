<?php 

/**
 * Acción para editar imageCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditImageCategoryAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el imageCategory a modificar.
		$oImageCategory = new ImageCategory ( );
		
				
		$oImageCategory->setCd_image_category ( CdtUtils::getParamPOST('cd_image_category') );	
				
		$oImageCategory->setDs_image_category ( CdtUtils::getParamPOST('ds_image_category') );	
		
					
		return $oImageCategory;
	}
	
		
}
