<?php 

/**
 * Acci�n para inicializar el contexto para editar imageCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditImageCategoryInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_IMAGECATEGORY_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el imageCategory a modificar.
		$oImageCategory = new ImageCategory ( );
	
				
		$oImageCategory->setCd_image_category ( CdtUtils::getParamPOST('cd_image_category') );	
				
		$oImageCategory->setDs_image_category ( CdtUtils::getParamPOST('ds_image_category') );	
		
		
		return $oImageCategory;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oImageCategory = CdtFormatUtils::ifEmpty($entity, new ImageCategory());

		//parseamos la entity
		
		
		
				
		$xtpl->assign ( 'cd_image_category', stripslashes ( $oImageCategory->getCd_image_category () ) );
		$xtpl->assign ( 'cd_image_category_label', BOL_LBL_IMAGECATEGORY_CD_IMAGE_CATEGORY );
		$xtpl->assign ( 'cd_image_category_required', '*' );
		$xtpl->assign ( 'cd_image_category_required_msg', BOL_MSG_IMAGECATEGORY_CD_IMAGE_CATEGORY_REQUIRED );
				
		$xtpl->assign ( 'ds_image_category', stripslashes ( $oImageCategory->getDs_image_category () ) );
		$xtpl->assign ( 'ds_image_category_label', BOL_LBL_IMAGECATEGORY_DS_IMAGE_CATEGORY );
		$xtpl->assign ( 'ds_image_category_required', '*' );
		$xtpl->assign ( 'ds_image_category_required_msg', BOL_MSG_IMAGECATEGORY_DS_IMAGE_CATEGORY_REQUIRED );
		
		
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
