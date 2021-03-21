<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un category.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddCategoryInitAction extends EditCategoryInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CATEGORY_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditCategoryInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_category";
	}

	
}
