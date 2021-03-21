<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un status.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddStatusInitAction extends EditStatusInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_STATUS_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditStatusInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_status";
	}

	
}
