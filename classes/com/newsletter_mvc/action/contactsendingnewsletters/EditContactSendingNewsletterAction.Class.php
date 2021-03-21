<?php 

/**
 * Acción para editar contactSendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditContactSendingNewsletterAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contactSendingNewsletter a modificar.
		$oContactSendingNewsletter = new ContactSendingNewsletter ( );
		
				
		$oContactSendingNewsletter->setCd_contact_sending_newsletter ( CdtUtils::getParamPOST('cd_contact_sending_newsletter') );	
				
		$oContactSendingNewsletter->setCd_sending_newsletter ( CdtUtils::getParamPOST('cd_sending_newsletter') );	
				
		$oContactSendingNewsletter->setCd_contact ( CdtUtils::getParamPOST('cd_contact') );	
				
		$oContactSendingNewsletter->setCd_category ( CdtUtils::getParamPOST('cd_category') );	
				
		$oContactSendingNewsletter->setDt_date ( CdtUtils::getParamPOST('dt_date') );	
				
		$oContactSendingNewsletter->setDs_time ( CdtUtils::getParamPOST('ds_time') );	
				
		$oContactSendingNewsletter->setBl_sent ( CdtUtils::getParamPOST('bl_sent') );	
				
		$oContactSendingNewsletter->setDt_sent ( CdtUtils::getParamPOST('dt_sent') );	
				
		$oContactSendingNewsletter->setNu_hard ( CdtUtils::getParamPOST('nu_hard') );	
				
		$oContactSendingNewsletter->setNu_soft ( CdtUtils::getParamPOST('nu_soft') );	
				
		$oContactSendingNewsletter->setBl_processed ( CdtUtils::getParamPOST('bl_processed') );	
				
		$oContactSendingNewsletter->setBl_open ( CdtUtils::getParamPOST('bl_open') );	
		
					
		return $oContactSendingNewsletter;
	}
	
		
}
