<?php

/**
 * Acci�n para eliminar status.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class DeleteStatusAction extends CdtEditAction {

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
		$manager = new StatusManager();
		$manager->deleteStatus( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		$this->setDs_forward_params("search=1");
		return 'delete_status_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		$_GET['search']=1;
		return 'delete_status_error';
	}


}
