<?php 

/**
 * Acción para modificar newsletterImage.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateNewsletterImageAction extends EditNewsletterImageAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new NewsletterImageManager();
		$manager->updateNewsletterImage( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_newsletterimage_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_newsletterimage_error';
	}

	
}
