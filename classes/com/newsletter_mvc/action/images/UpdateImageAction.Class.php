<?php 

/**
 * Acción para modificar image.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateImageAction extends EditImageAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ImageManager();
		$manager->updateImage( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_image_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_image_error';
	}

	
}
