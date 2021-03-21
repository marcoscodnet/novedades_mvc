<?php 

/**
 * Acción para editar contact.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditContactAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contact a modificar.
		$oContact = new Contact ( );
		
				
		$oContact->setCd_contact ( CdtUtils::getParamPOST('cd_contact') );	
				
		$oContact->setDs_name ( CdtUtils::getParamPOST('ds_name') );	
				
		$oContact->setDs_mail ( CdtUtils::getParamPOST('ds_mail') );	
				
		$oContact->setDs_phone ( CdtUtils::getParamPOST('ds_phone') );	
				
		$oContact->setDs_movil ( CdtUtils::getParamPOST('ds_movil') );	
				
		$oContact->setDs_address ( CdtUtils::getParamPOST('ds_address') );	
				
		$oContact->setDt_birthday ( BOLUtils::formatDateToPersist(CdtUtils::getParamPOST('dt_birthday')) );	
				
		$oContact->setBl_signed ( CdtUtils::getParamPOST('bl_signed') );	
				
				
		$oContact->setDs_company ( CdtUtils::getParamPOST('ds_company') );	
				
		$oContact->setBl_blocked ( CdtUtils::getParamPOST('bl_blocked') );	
		
					
		return $oContact;
	}
	
		
}
