<?php 

/**
 * Acci�n para inicializar el contexto para editar image.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditImageInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_IMAGE_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el image a modificar.
		$oImage = new Image ( );
	
				
		$oImage->setCd_image ( CdtUtils::getParamPOST('cd_image') );	
				
		$oImage->setCd_image_category ( CdtUtils::getParamPOST('cd_image_category') );	
				
		$oImage->setCd_template ( CdtUtils::getParamPOST('cd_template') );	
				
		$oImage->setDs_image ( CdtUtils::getParamPOST('ds_image') );	
				
		$oImage->setNu_size ( CdtUtils::getParamPOST('nu_size') );	
				
		$oImage->setDs_type ( CdtUtils::getParamPOST('ds_type') );	
				
		$oImage->setDt_date ( CdtUtils::getParamPOST('dt_date') );	
		
		
		return $oImage;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oImage = CdtFormatUtils::ifEmpty($entity, new Image());

		//parseamos la entity
		
				
		$xtpl->assign ( 'ds_image', stripslashes ( $oImage->getDs_image () ) );
		$xtpl->assign ( 'ds_image_label', BOL_LBL_IMAGE_DS_IMAGE );
				
		$xtpl->assign ( 'ds_type', stripslashes ( $oImage->getDs_type () ) );
		$xtpl->assign ( 'ds_type_label', BOL_LBL_IMAGE_DS_TYPE );
		
		
				
		$xtpl->assign ( 'cd_image', stripslashes ( $oImage->getCd_image () ) );
		$xtpl->assign ( 'cd_image_label', BOL_LBL_IMAGE_CD_IMAGE );
		$xtpl->assign ( 'cd_image_required', '*' );
		$xtpl->assign ( 'cd_image_required_msg', BOL_MSG_IMAGE_CD_IMAGE_REQUIRED );
				
		$xtpl->assign ( 'nu_size', stripslashes ( $oImage->getNu_size () ) );
		$xtpl->assign ( 'nu_size_label', BOL_LBL_IMAGE_NU_SIZE );
		$xtpl->assign ( 'nu_size_required', '*' );
		$xtpl->assign ( 'nu_size_required_msg', BOL_MSG_IMAGE_NU_SIZE_REQUIRED );
				
		$xtpl->assign ( 'dt_date', stripslashes ( $oImage->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_IMAGE_DT_DATE );
		$xtpl->assign ( 'dt_date_required', '*' );
		$xtpl->assign ( 'dt_date_required_msg', BOL_MSG_IMAGE_DT_DATE_REQUIRED );
		
		
		//parseamos las relaciones de la entity
		
		$xtpl->assign ( 'cd_image_category_label', BOL_LBL_IMAGE_CD_IMAGE_CATEGORY );
		$selected =  $oImage->getImage();
		
		$oFindObject = BOLComponentsFactory::getFindObjectImage( $selected, 'cd_image_category', true,  BOL_MSG_IMAGE_CD_IMAGE_CATEGORY_REQUIRED  );

		$xtpl->assign('image_find', $oFindObject->show() );
		
		
		$xtpl->assign ( 'cd_template_label', BOL_LBL_IMAGE_CD_TEMPLATE );
		$selected =  $oImage->getTemplate();
		
		$oFindObject = BOLComponentsFactory::getFindObjectTemplate( $selected, 'cd_template', true,  BOL_MSG_IMAGE_CD_TEMPLATE_REQUIRED  );

		$xtpl->assign('template_find', $oFindObject->show() );
		
		
		
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
	
	
	protected function parseImage($selected, XTemplate $xtpl ){
	
		$manager = new ImageManager();
		$oCriteria = new CdtSearchCriteria();
		$images = $manager->getImages( $oCriteria );
		
		$xtpl->assign ( 'lbl_select', BOL_LBL_SELECT );
		
		foreach($images as $key => $oImage) {
		
			$xtpl->assign ( 'ds_image', $oImage->getCd_image_category() );
			$xtpl->assign ( 'cd_image', FormatUtils::selected($oImage->getCd_image_category(), $selected ) );
			
			$xtpl->parse ( 'main.images_option' );
		}	
	}
	
	protected function parseTemplate($selected, XTemplate $xtpl ){
	
		$manager = new TemplateManager();
		$oCriteria = new CdtSearchCriteria();
		$templates = $manager->getTemplates( $oCriteria );
		
		$xtpl->assign ( 'lbl_select', BOL_LBL_SELECT );
		
		foreach($templates as $key => $oTemplate) {
		
			$xtpl->assign ( 'ds_template', $oTemplate->getCd_template() );
			$xtpl->assign ( 'cd_template', FormatUtils::selected($oTemplate->getCd_template(), $selected ) );
			
			$xtpl->parse ( 'main.templates_option' );
		}	
	}
	

}
