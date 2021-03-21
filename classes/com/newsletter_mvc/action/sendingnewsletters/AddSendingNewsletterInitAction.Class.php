<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un sendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddSendingNewsletterInitAction extends EditSendingNewsletterInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_SENDINGNEWSLETTER_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditSendingNewsletterInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_sendingnewsletter";
	}

	
}
