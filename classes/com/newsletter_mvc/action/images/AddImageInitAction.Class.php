<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un image.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddImageInitAction extends EditImageInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_IMAGE_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditImageInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_image";
	}

	
}
