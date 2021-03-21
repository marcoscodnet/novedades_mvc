<?php 

/**
 * Acci�n para inicializar el contexto para editar contact.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditContactInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_CONTACT_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contact a modificar.
		$oContact = new Contact ( );
	
				
		$oContact->setCd_contact ( CdtUtils::getParamPOST('cd_contact') );	
				
		$oContact->setDs_name ( CdtUtils::getParamPOST('ds_name') );	
				
		$oContact->setDs_mail ( CdtUtils::getParamPOST('ds_mail') );	
				
		$oContact->setDs_phone ( CdtUtils::getParamPOST('ds_phone') );	
				
		$oContact->setDs_movil ( CdtUtils::getParamPOST('ds_movil') );	
				
		$oContact->setDs_address ( CdtUtils::getParamPOST('ds_address') );	
				
		$oContact->setDt_birthday ( BOLUtils::formatDateToPersist(CdtUtils::getParamPOST('dt_birthday')) );	
				
		$oContact->setBl_signed ( CdtUtils::getParamPOST('bl_signed') );	
				
		
				
		$oContact->setDs_company ( CdtUtils::getParamPOST('ds_company') );	
				
		$oContact->setBl_blocked ( CdtUtils::getParamPOST('bl_blocked') );	
		
		
		return $oContact;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oContact = CdtFormatUtils::ifEmpty($entity, new Contact());

		//parseamos la entity
		
				
		$xtpl->assign ( 'ds_phone', stripslashes ( $oContact->getDs_phone () ) );
		$xtpl->assign ( 'ds_phone_label', BOL_LBL_CONTACT_DS_PHONE );
				
		$xtpl->assign ( 'ds_movil', stripslashes ( $oContact->getDs_movil () ) );
		$xtpl->assign ( 'ds_movil_label', BOL_LBL_CONTACT_DS_MOVIL );
				
		$xtpl->assign ( 'ds_address', stripslashes ( $oContact->getDs_address () ) );
		$xtpl->assign ( 'ds_address_label', BOL_LBL_CONTACT_DS_ADDRESS );
				
		$xtpl->assign ( 'dt_birthday', BOLUtils::formatDateToView ( $oContact->getDt_birthday () ) );
		$xtpl->assign ( 'dt_birthday_label', BOL_LBL_CONTACT_DT_BIRTHDAY );
				
		$xtpl->assign ( 'bl_signed', stripslashes ( $oContact->getBl_signed () ) );
		$xtpl->assign ( 'bl_signed_label', BOL_LBL_CONTACT_BL_SIGNED );
				
		if ($oContact->getBl_signed() == 1) {
            $xtpl->assign('checked_bl_signed', 'checked');
        } else {
            $xtpl->assign('checked_bl_signed', '');
        }
				
		$xtpl->assign ( 'ds_company', stripslashes ( $oContact->getDs_company () ) );
		$xtpl->assign ( 'ds_company_label', BOL_LBL_CONTACT_DS_COMPANY );
		
		
				
		$xtpl->assign ( 'cd_contact', stripslashes ( $oContact->getCd_contact () ) );
		$xtpl->assign ( 'cd_contact_label', BOL_LBL_CONTACT_CD_CONTACT );
		$xtpl->assign ( 'cd_contact_required', '*' );
		$xtpl->assign ( 'cd_contact_required_msg', BOL_MSG_CONTACT_CD_CONTACT_REQUIRED );
				
		$xtpl->assign ( 'ds_name', stripslashes ( $oContact->getDs_name () ) );
		$xtpl->assign ( 'ds_name_label', BOL_LBL_CONTACT_DS_NAME );
		$xtpl->assign ( 'ds_name_required', '*' );
		$xtpl->assign ( 'ds_name_required_msg', BOL_MSG_CONTACT_DS_NAME_REQUIRED );
				
		$xtpl->assign ( 'ds_mail', stripslashes ( $oContact->getDs_mail () ) );
		$xtpl->assign ( 'ds_mail_label', BOL_LBL_CONTACT_DS_MAIL );
		$xtpl->assign ( 'ds_mail_required', '*' );
		$xtpl->assign ( 'ds_mail_required_msg', BOL_MSG_CONTACT_DS_MAIL_REQUIRED );
		$xtpl->assign ( 'ds_mail_mail_msg', BOL_MSG_INVALID_MAIL );
				
		$xtpl->assign ( 'bl_blocked', stripslashes ( $oContact->getBl_blocked () ) );
		$xtpl->assign ( 'bl_blocked_label', BOL_LBL_CONTACT_BL_BLOCKED );
		
		if ($oContact->getBl_blocked() == 1) {
            $xtpl->assign('checked_bl_blocked', 'checked');
        } else {
            $xtpl->assign('checked_bl_blocked', '');
        }
        
        $oFindObject = BOLComponentsFactory::getFindObjectCategory( new Category(), 'cd_category', true, BOL_MSG_CONTACTCATEGORY_CD_CATEGORY_REQUIRED );

		$xtpl->assign('Category_find', $oFindObject->show() );
		
		//parseamos las relaciones de la entity
		
		
		
		//parseamos el action submit.
		$xtpl->assign('submit',  $this->getSubmitAction() );
		
		$xtpl->assign ( 'lbl_save', BOL_LBL_SAVE);
		$xtpl->assign ( 'lbl_cancel', BOL_LBL_CANCEL);
		$xtpl->assign ( 'msg_required_fields', BOL_MSG_REQUIRED_FIELDS);
		$this->parseCategories($entity, $xtpl);
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected abstract function getSubmitAction();
	
	protected function parseCategories($entity, XTemplate $xtpl) {

        
        $xtpl->assign('ds_category_label', BOL_MSG_CATEGORY_TITLE);
        $xtpl->assign('delete_label', BOL_LBL_DELETE);
        $xtpl->assign('msg_confirm_delete', BOL_MSG_CONFIRM_DELETE_QUESTION);
        $xtpl->assign('msg_confirm_title', CDT_CMP_GRID_MSG_CONFIRM_DELETE_TITLE);
         
        $xtpl->assign('submit_category', "add_contactcategory");
        $xtpl->assign('add_category', BOL_MSG_CATEGORY_TITLE_ADD);

        $categories=$entity->getCategories();
        
	 	foreach ($categories as $key => $oCategory) {
            if ($key == 0) {
                $key = 'x';
            }
            $xtpl->assign('key', $key);
           
            $xtpl->assign('ds_category', ($oCategory->getDs_category()));
            $xtpl->parse('main.itemcategories');
        }
        $_SESSION['categories_session'] = serialize($categories);
        
    }
	

}
