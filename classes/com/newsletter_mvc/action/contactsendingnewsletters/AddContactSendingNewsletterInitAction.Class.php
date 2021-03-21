<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un contactSendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddContactSendingNewsletterInitAction extends EditContactSendingNewsletterInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditContactSendingNewsletterInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_contactsendingnewsletter";
	}

	
}
