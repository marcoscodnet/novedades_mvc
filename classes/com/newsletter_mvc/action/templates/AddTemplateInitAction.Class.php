<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un template.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddTemplateInitAction extends EditTemplateInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_TEMPLATE_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditTemplateInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_template";
	}

	
}
