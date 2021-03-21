<?php 

/**
 * Acción para dar de alta un newsletterImage.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddNewsletterImageAction extends EditNewsletterImageAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new NewsletterManager();
		$manager->updateNewsletterImages( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_newsletterimage_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_newsletterimage_error';
	}
		
	
}
