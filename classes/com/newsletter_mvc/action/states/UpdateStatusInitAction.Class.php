<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un status.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateStatusInitAction extends EditStatusInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oStatus = null;

		//recuperamos dado su identifidor.
		$cd_status = CdtUtils::getParam('id');
			
		if (!empty( $cd_status )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_status', $cd_status, '=');
			
			$manager = new StatusManager();
			$oStatus = $manager->getStatus( $oCriteria );
			
		}else{
		
			$oStatus = parent::getEntity();
		
		}
		return $oStatus ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditStatusInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_status";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_STATUS_TITLE_UPDATE;
	}

}
