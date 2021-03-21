<?php 

/**
 * Acción para inicializar el contexto para editar item.
 * 
 * @author Marcos
 * @since 13/07/2015
 * 
 */
abstract class EditItemInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_ITEM_EDIT );		
	}

	
		
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oItem = CdtFormatUtils::ifEmpty($entity, new Item());

		//parseamos la entity
		
		$xtpl->assign ( 'cd_item', stripslashes ( $oItem->getCd_item () ) );
		$xtpl->assign ( 'cd_item_label', BOL_LBL_ITEM_CD_ITEM );
		
		$xtpl->assign ( 'cd_newsletter_label', BOL_LBL_NEWSLETTERIMAGE_CD_NEWSLETTER );
		$xtpl->assign ( 'cd_newsletter', $oItem->getCd_newsletter() );
		$selected =  $oItem->getNewsletter();
		
		$oFindObject = BOLComponentsFactory::getFindObjectNewsletter( $selected, 'cd_newsletter', false,  BOL_MSG_NEWSLETTERIMAGE_CD_NEWSLETTER_REQUIRED  );

		$xtpl->assign('newsletter_find', $oFindObject->show() );
		
		$xtpl->assign ( 'nu_order_label', BOL_LBL_ITEM_NU_ORDER );
		$xtpl->assign ( 'nu_order', $oItem->getNu_order() );
		
		$xtpl->assign ( 'nu_order_valid_msg', BOL_MSG_INVALID_NUMBER );
		
		$xtpl->assign ( 'ds_image_label', BOL_LBL_ITEM_DS_IMAGE );
		
		$xtpl->assign ( 'ds_image_valid_msg', BOL_MSG_INVALID_IMAGE );
		
		if ($oItem->getDs_image()) {
			$xtpl->assign ( 'divImage', '<img src="'.WEB_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/'.$oItem->getDs_image().'" border="0"/>' );
			$xtpl->assign ( 'ds_imageant', stripslashes ( $oItem->getDs_image () ) );
		}
		
		
				
		//$xtpl->assign ( 'ds_speech', BOL_MSG_NEWSLETTER_SPEECH );
		
		$xtpl->assign ( 'ds_text', stripslashes ( $oItem->getDs_item () ) );
		$xtpl->assign ( 'ds_text_label', BOL_LBL_ITEM_DS_ITEM );
		
		
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
