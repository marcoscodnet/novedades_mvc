<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un contact.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddContactInitAction extends EditContactInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACT_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditContactInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_contact";
	}

	
}
