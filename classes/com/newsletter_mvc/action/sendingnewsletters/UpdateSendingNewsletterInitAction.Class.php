<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un sendingNewsletter.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateSendingNewsletterInitAction extends EditSendingNewsletterInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oSendingNewsletter = null;

		//recuperamos dado su identifidor.
		$cd_sendingNewsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_sendingNewsletter )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_sending_newsletter', $cd_sendingNewsletter, '=');
			
			$manager = new SendingNewsletterManager();
			$oSendingNewsletter = $manager->getSendingNewsletter( $oCriteria );
			
		}else{
		
			$oSendingNewsletter = parent::getEntity();
		
		}
		return $oSendingNewsletter ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditSendingNewsletterInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_sendingnewsletter";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_SENDINGNEWSLETTER_TITLE_UPDATE;
	}

}
