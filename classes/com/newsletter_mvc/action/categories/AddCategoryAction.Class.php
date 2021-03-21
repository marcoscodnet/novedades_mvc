<?php 

/**
 * Acción para dar de alta un category.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddCategoryAction extends EditCategoryAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new CategoryManager();
		$manager->addCategory( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_category_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_category_error';
	}
		
	
}
