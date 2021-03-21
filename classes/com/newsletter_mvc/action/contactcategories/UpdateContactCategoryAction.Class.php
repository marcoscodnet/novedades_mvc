<?php 

/**
 * Acción para modificar contactCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateContactCategoryAction extends EditContactCategoryAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ContactCategoryManager();
		$manager->updateContactCategory( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_contactcategory_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_contactcategory_error';
	}

	
}
