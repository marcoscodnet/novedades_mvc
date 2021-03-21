<?php 

/**
 * Acción para modificar status.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateStatusAction extends EditStatusAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new StatusManager();
		$manager->updateStatus( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_status_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_status_error';
	}

	
}
