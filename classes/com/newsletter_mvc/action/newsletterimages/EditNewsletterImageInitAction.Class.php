<?php 

/**
 * Acci�n para inicializar el contexto para editar newsletterImage.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditNewsletterImageInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_NEWSLETTERIMAGE_EDIT );		
	}

	
		
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oNewsletter = CdtFormatUtils::ifEmpty($entity, new Newsletter());

		//parseamos la entity
		
				
		
		
		$xtpl->assign ( 'divHeader', '<img src="'.WEB_PATH.'css/templates/images/'.$oNewsletter->getImg_header().'" border="0"/>' );
		$xtpl->assign ( 'divFooter', '<img src="'.WEB_PATH.'css/templates/images/'.$oNewsletter->getImg_footer().'" border="0"/>' );
				
		
				
		
		$xtpl->assign ( 'img_header_label', BOL_LBL_NEWSLETTER_IMAGE_HEADER );
		$xtpl->assign ( 'img_header_required', '*' );
		$xtpl->assign ( 'img_header_required_msg', BOL_MSG_NEWSLETTER_IMAGE_HEADER_REQUIRED );
		$xtpl->assign ( 'ds_image_valid_msg', BOL_MSG_INVALID_IMAGE );
				
		$xtpl->assign ( 'img_footer_label', BOL_LBL_NEWSLETTER_IMAGE_FOOTER );
		$xtpl->assign ( 'img_footer_required', '*' );
		$xtpl->assign ( 'img_footer_required_msg', BOL_MSG_NEWSLETTER_IMAGE_FOOTER_REQUIRED );
		
		
		//parseamos las relaciones de la entity
		
		$xtpl->assign ( 'cd_newsletter_label', BOL_LBL_NEWSLETTERIMAGE_CD_NEWSLETTER );
		$selected =  $oNewsletter;
		
		$oFindObject = BOLComponentsFactory::getFindObjectNewsletter( $selected, 'cd_newsletter', false,  BOL_MSG_NEWSLETTERIMAGE_CD_NEWSLETTER_REQUIRED  );

		$xtpl->assign('newsletter_find', $oFindObject->show() );
		
		
		
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
