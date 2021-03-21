<?php 

/**
 * Acci�n para inicializar el contexto para dar de alta
 * un newsletterImage.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddNewsletterImageInitAction extends EditNewsletterImageInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oNewsletter = null;

		//recuperamos dado su identifidor.
		$cd_newsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_newsletter )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_newsletter', $cd_newsletter, '=');
			
			$manager = new NewsletterManager();
			$oNewsletter = $manager->getNewsletter( $oCriteria );
			
		}
		return $oNewsletter ;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_NEWSLETTERIMAGE_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditNewsletterImageInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_newsletterimage";
	}

	
}
