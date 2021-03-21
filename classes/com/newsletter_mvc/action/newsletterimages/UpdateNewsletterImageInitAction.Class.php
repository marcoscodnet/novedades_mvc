<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un newsletterImage.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateNewsletterImageInitAction extends EditNewsletterImageInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oNewsletterImage = null;

		//recuperamos dado su identifidor.
		$cd_newsletterImage = CdtUtils::getParam('id');
			
		if (!empty( $cd_newsletterImage )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_newsletter_image', $cd_newsletterImage, '=');
			
			$manager = new NewsletterImageManager();
			$oNewsletterImage = $manager->getNewsletterImage( $oCriteria );
			
		}else{
		
			$oNewsletterImage = parent::getEntity();
		
		}
		return $oNewsletterImage ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditNewsletterImageInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_newsletterimage";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_NEWSLETTERIMAGE_TITLE_UPDATE;
	}

}
