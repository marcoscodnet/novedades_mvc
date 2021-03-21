<?php 

/**
 * Acción para editar sendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditSendingNewsletterAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el sendingNewsletter a modificar.
		$oSendingNewsletter = new SendingNewsletter ( );
		
				
		$oSendingNewsletter->setCd_sending_newsletter ( CdtUtils::getParamPOST('cd_sending_newsletter') );	
				
		$oSendingNewsletter->setCd_newsletter ( CdtUtils::getParamPOST('cd_newsletter') );	
				
		$oSendingNewsletter->setDt_date ( CdtUtils::getParamPOST('dt_date') );	
				
		$oSendingNewsletter->setDs_time ( CdtUtils::getParamPOST('ds_time') );	
				
		$oSendingNewsletter->setBl_sent ( CdtUtils::getParamPOST('bl_sent') );	
		
					
		return $oSendingNewsletter;
	}
	
		
}
