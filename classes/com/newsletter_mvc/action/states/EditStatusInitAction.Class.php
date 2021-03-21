<?php 

/**
 * Acci�n para inicializar el contexto para editar status.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditStatusInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_STATUS_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el status a modificar.
		$oStatus = new Status ( );
	
				
		$oStatus->setCd_status ( CdtUtils::getParamPOST('cd_status') );	
				
		$oStatus->setDs_status ( CdtUtils::getParamPOST('ds_status') );	
		
		
		return $oStatus;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oStatus = CdtFormatUtils::ifEmpty($entity, new Status());

		//parseamos la entity
		
		
		
				
		$xtpl->assign ( 'cd_status', stripslashes ( $oStatus->getCd_status () ) );
		$xtpl->assign ( 'cd_status_label', BOL_LBL_STATUS_CD_STATUS );
		$xtpl->assign ( 'cd_status_required', '*' );
		$xtpl->assign ( 'cd_status_required_msg', BOL_MSG_STATUS_CD_STATUS_REQUIRED );
				
		$xtpl->assign ( 'ds_status', stripslashes ( $oStatus->getDs_status () ) );
		$xtpl->assign ( 'ds_status_label', BOL_LBL_STATUS_DS_STATUS );
		$xtpl->assign ( 'ds_status_required', '*' );
		$xtpl->assign ( 'ds_status_required_msg', BOL_MSG_STATUS_DS_STATUS_REQUIRED );
		
		
		//parseamos las relaciones de la entity
		
		
		//parseamos el action submit.
		$xtpl->assign('submit',  $this->getSubmitAction() );
		
		$xtpl->assign ( 'lbl_save', BOL_LBL_SAVE);
		$xtpl->assign ( 'lbl_cancel', BOL_LBL_CANCEL);
		$xtpl->assign ( 'msg_required_fields', BOL_MSG_REQUIRED_FIELDS);
		
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected abstract function getSubmitAction();
	
	

}
