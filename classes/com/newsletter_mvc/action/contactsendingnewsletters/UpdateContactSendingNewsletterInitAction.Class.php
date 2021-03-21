<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un contactSendingNewsletter.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateContactSendingNewsletterInitAction extends EditContactSendingNewsletterInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oContactSendingNewsletter = null;

		//recuperamos dado su identifidor.
		$cd_contactSendingNewsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_contactSendingNewsletter )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact_sending_newsletter', $cd_contactSendingNewsletter, '=');
			
			$manager = new ContactSendingNewsletterManager();
			$oContactSendingNewsletter = $manager->getContactSendingNewsletter( $oCriteria );
			
		}else{
		
			$oContactSendingNewsletter = parent::getEntity();
		
		}
		return $oContactSendingNewsletter ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditContactSendingNewsletterInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_contactsendingnewsletter";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_UPDATE;
	}

}
