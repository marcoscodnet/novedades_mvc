<?php 

/**
 * Acción para editar template.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditTemplateAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el template a modificar.
		$oTemplate = new Template ( );
		
				
		$oTemplate->setCd_template ( CdtUtils::getParamPOST('cd_template') );	
				
		$oTemplate->setDs_template ( CdtUtils::getParamPOST('ds_template') );	
				
		$oTemplate->setDs_path ( CdtUtils::getParamPOST('ds_path') );	
				
		$oTemplate->setNu_image ( CdtUtils::getParamPOST('nu_image') );	
		
					
		return $oTemplate;
	}
	
		
}
