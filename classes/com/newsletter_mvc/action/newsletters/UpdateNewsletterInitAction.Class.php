<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un newsletter.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateNewsletterInitAction extends EditNewsletterInitAction{

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
			
		}else{
		
			$oNewsletter = parent::getEntity();
		
		}
		return $oNewsletter ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditNewsletterInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_newsletter";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_NEWSLETTER_TITLE_UPDATE;
	}

}
