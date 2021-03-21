<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un contactCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddContactCategoryInitAction extends EditContactCategoryInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTCATEGORY_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditContactCategoryInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_contactcategory";
	}

	
}
