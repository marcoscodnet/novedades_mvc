<?php 

/**
 * Acci�n para modificar item.
 * 
 * @author Marcos
 * @since 15-07-2015
 *  
 */
class UpdateItemAction extends EditItemAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ItemManager();
		$manager->updateItem( $oEntity );
		$this->setDs_forward_params("id=" . $oEntity->getCd_newsletter() );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_item_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_item_error';
	}

	
}
