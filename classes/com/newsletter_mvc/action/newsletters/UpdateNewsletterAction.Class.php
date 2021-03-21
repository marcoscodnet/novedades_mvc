<?php 

/**
 * Acción para modificar newsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateNewsletterAction extends EditNewsletterAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		if (CdtUtils::getParamPOST(BOL_NAME_PREVIEW) ) {
			$_SESSION['newsletter_session']=serialize($oEntity); 
		}
		else {
			$manager = new NewsletterManager();
			$manager->updateNewsletter( $oEntity );
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		if (CdtUtils::getParamPOST(BOL_NAME_PREVIEW) ) {
			$this->setDs_forward_params("temp=1");
			return 'add_newsletter_temp';
		}
		else {
			return 'update_newsletter_success';
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_newsletter_error';
	}

	
}
