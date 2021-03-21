<?php 

/**
 * Acción para dar de alta un image.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddImageAction extends EditImageAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new ImageManager();
		$manager->addImage( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_image_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_image_error';
	}
		
	
}
