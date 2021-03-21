<?php 

/**
 * Acci�n para inicializar el contexto para editar contactCategory.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditContactCategoryInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_CONTACTCATEGORY_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contactCategory a modificar.
		$oContactCategory = new ContactCategory ( );
	
				
		$oContactCategory->setCd_contact_category ( CdtUtils::getParamPOST('cd_contact_category') );	
				
		$oContactCategory->setCd_contact ( CdtUtils::getParamPOST('cd_contact') );	
				
		$oContactCategory->setCd_category ( CdtUtils::getParamPOST('cd_category') );	
		
		
		return $oContactCategory;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oContactCategory = CdtFormatUtils::ifEmpty($entity, new ContactCategory());

		//parseamos la entity
		
		
		
				
		$xtpl->assign ( 'cd_contact_category', stripslashes ( $oContactCategory->getCd_contact_category () ) );
		$xtpl->assign ( 'cd_contact_category_label', BOL_LBL_CONTACTCATEGORY_CD_CONTACT_CATEGORY );
		$xtpl->assign ( 'cd_contact_category_required', '*' );
		$xtpl->assign ( 'cd_contact_category_required_msg', BOL_MSG_CONTACTCATEGORY_CD_CONTACT_CATEGORY_REQUIRED );
		
		
		//parseamos las relaciones de la entity
		
		$xtpl->assign ( 'cd_contact_label', BOL_LBL_CONTACTCATEGORY_CD_CONTACT );
		$selected =  $oContactCategory->getContact();
		
		$oFindObject = BOLComponentsFactory::getFindObjectContact( $selected, 'cd_contact', true,  BOL_MSG_CONTACTCATEGORY_CD_CONTACT_REQUIRED  );

		$xtpl->assign('contact_find', $oFindObject->show() );
		
		
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CONTACTCATEGORY_CD_CATEGORY );
		$selected =  $oContactCategory->getCategory();
		
		$oFindObject = BOLComponentsFactory::getFindObjectCategory( $selected, 'cd_category', true,  BOL_MSG_CONTACTCATEGORY_CD_CATEGORY_REQUIRED  );

		$xtpl->assign('category_find', $oFindObject->show() );
		
		
		
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
	
	
	protected function parseContact($selected, XTemplate $xtpl ){
	
		$manager = new ContactManager();
		$oCriteria = new CdtSearchCriteria();
		$contacts = $manager->getContacts( $oCriteria );
		
		$xtpl->assign ( 'lbl_select', BOL_LBL_SELECT );
		
		foreach($contacts as $key => $oContact) {
		
			$xtpl->assign ( 'ds_contact', $oContact->getCd_contact() );
			$xtpl->assign ( 'cd_contact', FormatUtils::selected($oContact->getCd_contact(), $selected ) );
			
			$xtpl->parse ( 'main.contacts_option' );
		}	
	}
	
	protected function parseCategory($selected, XTemplate $xtpl ){
	
		$manager = new CategoryManager();
		$oCriteria = new CdtSearchCriteria();
		$categories = $manager->getCategories( $oCriteria );
		
		$xtpl->assign ( 'lbl_select', BOL_LBL_SELECT );
		
		foreach($categories as $key => $oCategory) {
		
			$xtpl->assign ( 'ds_category', $oCategory->getCd_category() );
			$xtpl->assign ( 'cd_category', FormatUtils::selected($oCategory->getCd_category(), $selected ) );
			
			$xtpl->parse ( 'main.categories_option' );
		}	
	}
	

}
