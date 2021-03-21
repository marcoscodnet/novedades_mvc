<?php 

/**
 * Acción para dar de alta un status.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddStatusAction extends EditStatusAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new StatusManager();
		$manager->addStatus( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_status_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_status_error';
	}
		
	
}
