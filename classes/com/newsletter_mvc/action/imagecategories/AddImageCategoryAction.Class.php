<?php 

/**
 * Acción para dar de alta un imageCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddImageCategoryAction extends EditImageCategoryAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new ImageCategoryManager();
		$manager->addImageCategory( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_imagecategory_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_imagecategory_error';
	}
		
	
}
