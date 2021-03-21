<?php 

/**
 * Acción para dar de alta un sendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddSendingNewsletterAction extends EditSendingNewsletterAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new SendingNewsletterManager();
		$manager->addSendingNewsletter( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_sendingnewsletter_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_sendingnewsletter_error';
	}
		
	
}
