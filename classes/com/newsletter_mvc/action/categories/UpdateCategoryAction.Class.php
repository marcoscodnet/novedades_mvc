<?php 

/**
 * Acción para modificar category.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateCategoryAction extends EditCategoryAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new CategoryManager();
		$manager->updateCategory( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_category_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_category_error';
	}

	
}
