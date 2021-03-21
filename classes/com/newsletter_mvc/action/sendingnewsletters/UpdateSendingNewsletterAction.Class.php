<?php 

/**
 * Acción para modificar sendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateSendingNewsletterAction extends EditSendingNewsletterAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new SendingNewsletterManager();
		$manager->updateSendingNewsletter( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_sendingnewsletter_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_sendingnewsletter_error';
	}

	
}
