<?php 

/**
 * Acci�n para inicializar el contexto para editar category.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditCategoryInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_CATEGORY_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el category a modificar.
		$oCategory = new Category ( );
	
				
		$oCategory->setCd_category ( CdtUtils::getParamPOST('cd_category') );	
				
		$oCategory->setDs_category ( CdtUtils::getParamPOST('ds_category') );	
		
		
		return $oCategory;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oCategory = CdtFormatUtils::ifEmpty($entity, new Category());

		//parseamos la entity
		
		
		
				
		$xtpl->assign ( 'cd_category', stripslashes ( $oCategory->getCd_category () ) );
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CATEGORY_CD_CATEGORY );
		$xtpl->assign ( 'cd_category_required', '*' );
		$xtpl->assign ( 'cd_category_required_msg', BOL_MSG_CATEGORY_CD_CATEGORY_REQUIRED );
				
		$xtpl->assign ( 'ds_category', stripslashes ( $oCategory->getDs_category () ) );
		$xtpl->assign ( 'ds_category_label', BOL_LBL_CATEGORY_DS_CATEGORY );
		$xtpl->assign ( 'ds_category_required', '*' );
		$xtpl->assign ( 'ds_category_required_msg', BOL_MSG_CATEGORY_DS_CATEGORY_REQUIRED );
		
		
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
