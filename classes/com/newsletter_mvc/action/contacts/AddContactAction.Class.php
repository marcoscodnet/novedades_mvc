<?php 

/**
 * Acción para dar de alta un contact.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddContactAction extends EditContactAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new ContactManager();
		$categories = unserialize($_SESSION['categories_session']);
		
		$manager->addContact( $oEntity, $categories );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_contact_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_contact_error';
	}
		
	
}
