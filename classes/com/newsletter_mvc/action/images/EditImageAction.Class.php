<?php 

/**
 * Acción para editar image.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditImageAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el image a modificar.
		$oImage = new Image ( );
		
				
		$oImage->setCd_image ( CdtUtils::getParamPOST('cd_image') );	
				
		$oImage->setCd_image_category ( CdtUtils::getParamPOST('cd_image_category') );	
				
		$oImage->setCd_template ( CdtUtils::getParamPOST('cd_template') );	
				
		$oImage->setDs_image ( CdtUtils::getParamPOST('ds_image') );	
				
		$oImage->setNu_size ( CdtUtils::getParamPOST('nu_size') );	
				
		$oImage->setDs_type ( CdtUtils::getParamPOST('ds_type') );	
				
		$oImage->setDt_date ( CdtUtils::getParamPOST('dt_date') );	
		
					
		return $oImage;
	}
	
		
}
