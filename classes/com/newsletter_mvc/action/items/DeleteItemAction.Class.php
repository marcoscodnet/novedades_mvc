<?php

/**
 * Acci�n para eliminar item.
 * 
 * @author Marcos
 * @since 15-07-2015
 * 
 */
class DeleteItemAction extends CdtEditAction {

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se obtiene el id de la entidad a eliminar.
		return CdtUtils::getParam('id');
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new ItemManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_item', $oEntity, '=');
		
		//recuperamos el operation
		
		$oItem = $manager->getItem( $oCriteria );
		$manager->deleteItem( $oEntity );
		unlink(APP_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/'.$oItem->getDs_image());
		$this->setDs_forward_params("search=1&id=" . $oItem->getCd_newsletter() );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		//$this->setDs_forward_params("search=1");
		return 'delete_item_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		$_GET['search']=1;
		return 'delete_item_error';
	}


}
