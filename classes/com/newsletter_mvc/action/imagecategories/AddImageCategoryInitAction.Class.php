<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un imageCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddImageCategoryInitAction extends EditImageCategoryInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_IMAGECATEGORY_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditImageCategoryInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_imagecategory";
	}

	
}
