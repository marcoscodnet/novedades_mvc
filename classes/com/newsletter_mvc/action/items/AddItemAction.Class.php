<?php 

/**
 * Acci�n para dar de alta un item.
 * 
 * @author Marcos
 * @since 14/07/2015
 * 
 */
class AddItemAction extends EditItemAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new ItemManager();
		$manager->addItem( $oEntity );
		$this->setDs_forward_params("id=" . $oEntity->getCd_newsletter() );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_item_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_item_error';
	}
		
	
}
