<?php 

/**
 * 
 * 
 * @author marcos
 * @since 25-10-2012
 * 
 */
class EditSubscriptionAction  extends CdtEditInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_SUBSCRIPTION_TITLE;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditGenreInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "edit_subscription_ajax";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_SUBSCRIPTION_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oFindObject = BOLComponentsFactory::getFindObjectCategory( new Category(), 'cd_category', true, BOL_MSG_CONTACTCATEGORY_CD_CATEGORY_REQUIRED );

		$xtpl->assign('Category_find', $oFindObject->show() );
		
		//parseamos las relaciones de la entity
		
		
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CONTACTCATEGORY_CD_CATEGORY );
		$xtpl->assign ( 'cd_category_required', '*' );
				
		
		$xtpl->assign ( 'ds_title_label', BOL_LBL_NEWSLETTER_DS_NEWSLETTER );
		$xtpl->assign ( 'ds_title_required', '*' );
		$xtpl->assign ( 'ds_title_required_msg', BOL_MSG_NEWSLETTER_DS_NEWSLETTER_REQUIRED );
		$xtpl->assign ( 'ds_title', BOL_SUBSCRIPTION_TITLE );
		
		$xtpl->assign ( 'ds_text_label', BOL_MSG_SUBSCRIPTION_TEXT_TITLE );
		$xtpl->assign ( 'ds_speech', BOL_MSG_SUBSCRIPTION_SPEECH );
		
		
		//parseamos el action submit.
		$xtpl->assign('submit',  $this->getSubmitAction() );
		
		$xtpl->assign ( 'lbl_generate_code', BOL_LBL_GENERATE_CODE);
		$xtpl->assign ( 'lbl_generate_code_name', BOL_LBL_GENERATE_CODE_NAME);
		$xtpl->assign ( 'lbl_cancel', BOL_LBL_CANCEL);
		$xtpl->assign ( 'msg_required_fields', BOL_MSG_REQUIRED_FIELDS);
		
	}

	

}
