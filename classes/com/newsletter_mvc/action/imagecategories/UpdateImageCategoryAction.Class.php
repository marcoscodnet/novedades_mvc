<?php 

/**
 * Acción para modificar imageCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateImageCategoryAction extends EditImageCategoryAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ImageCategoryManager();
		$manager->updateImageCategory( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_imagecategory_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_imagecategory_error';
	}

	
}
