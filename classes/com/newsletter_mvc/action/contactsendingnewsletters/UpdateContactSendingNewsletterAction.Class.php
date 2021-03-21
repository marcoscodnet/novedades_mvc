<?php 

/**
 * Acción para modificar contactSendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateContactSendingNewsletterAction extends EditContactSendingNewsletterAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ContactSendingNewsletterManager();
		$manager->updateContactSendingNewsletter( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_contactsendingnewsletter_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_contactsendingnewsletter_error';
	}

	
}
