<?php 

/**
 * Acci�n para inicializar el contexto para editar template.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditTemplateInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_TEMPLATE_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el template a modificar.
		$oTemplate = new Template ( );
	
				
		$oTemplate->setCd_template ( CdtUtils::getParamPOST('cd_template') );	
				
		$oTemplate->setDs_template ( CdtUtils::getParamPOST('ds_template') );	
				
		$oTemplate->setDs_path ( CdtUtils::getParamPOST('ds_path') );	
				
		$oTemplate->setNu_image ( CdtUtils::getParamPOST('nu_image') );	
		
		
		return $oTemplate;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oTemplate = CdtFormatUtils::ifEmpty($entity, new Template());

		//parseamos la entity
		
				
		$xtpl->assign ( 'nu_image', stripslashes ( $oTemplate->getNu_image () ) );
		$xtpl->assign ( 'nu_image_label', BOL_LBL_TEMPLATE_NU_IMAGE );
		
		
				
		$xtpl->assign ( 'cd_template', stripslashes ( $oTemplate->getCd_template () ) );
		$xtpl->assign ( 'cd_template_label', BOL_LBL_TEMPLATE_CD_TEMPLATE );
		$xtpl->assign ( 'cd_template_required', '*' );
		$xtpl->assign ( 'cd_template_required_msg', BOL_MSG_TEMPLATE_CD_TEMPLATE_REQUIRED );
				
		$xtpl->assign ( 'ds_template', stripslashes ( $oTemplate->getDs_template () ) );
		$xtpl->assign ( 'ds_template_label', BOL_LBL_TEMPLATE_DS_TEMPLATE );
		$xtpl->assign ( 'ds_template_required', '*' );
		$xtpl->assign ( 'ds_template_required_msg', BOL_MSG_TEMPLATE_DS_TEMPLATE_REQUIRED );
				
		$xtpl->assign ( 'ds_path', stripslashes ( $oTemplate->getDs_path () ) );
		$xtpl->assign ( 'ds_path_label', BOL_LBL_TEMPLATE_DS_PATH );
		$xtpl->assign ( 'ds_path_required', '*' );
		$xtpl->assign ( 'ds_path_required_msg', BOL_MSG_TEMPLATE_DS_PATH_REQUIRED );
		
		
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
