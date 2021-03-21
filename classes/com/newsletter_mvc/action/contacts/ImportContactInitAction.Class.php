<?php 

/**
 * Acci�n para inicializar el contexto para editar contact.
 * 
 * @author marcos
 * @since 23-10-2012
 * 
 */
class ImportContactInitAction  extends CdtEditInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTS_TITLE_IMPORT;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditGenreInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "import_contact";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_CONTACT_IMPORT );		
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
				
		
		$xtpl->assign ( 'ds_file_label', BOL_LBL_FILE_DS_NAME );
		$xtpl->assign ( 'ds_file_required', '*' );
		$xtpl->assign ( 'ds_file_required_msg', BOL_MSG_CONTACT_DS_FILE_REQUIRED );
		
		//parseamos el action submit.
		$xtpl->assign('submit',  $this->getSubmitAction() );
		
		$xtpl->assign ( 'lbl_save', BOL_LBL_IMPORT);
		$xtpl->assign ( 'lbl_cancel', BOL_LBL_CANCEL);
		$xtpl->assign ( 'msg_required_fields', BOL_MSG_REQUIRED_FIELDS);
		
	}

	

}
