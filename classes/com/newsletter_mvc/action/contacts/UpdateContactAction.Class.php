<?php 

/**
 * Acción para modificar contact.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateContactAction extends EditContactAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ContactManager();
		$categories = unserialize($_SESSION['categories_session']);
		
		$manager->updateContact( $oEntity, $categories );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_contact_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_contact_error';
	}

	
}
