<?php 

/**
 * Acción para editar status.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditStatusAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el status a modificar.
		$oStatus = new Status ( );
		
				
		$oStatus->setCd_status ( CdtUtils::getParamPOST('cd_status') );	
				
		$oStatus->setDs_status ( CdtUtils::getParamPOST('ds_status') );	
		
					
		return $oStatus;
	}
	
		
}
