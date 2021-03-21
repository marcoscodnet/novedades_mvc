<?php 

/**
 * Acci�n para inicializar el contexto para editar contactSendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditContactSendingNewsletterInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_CONTACTSENDINGNEWSLETTER_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contactSendingNewsletter a modificar.
		$oContactSendingNewsletter = new ContactSendingNewsletter ( );
	
				
		$oContactSendingNewsletter->setCd_contact_sending_newsletter ( CdtUtils::getParamPOST('cd_contact_sending_newsletter') );	
				
		$oContactSendingNewsletter->setCd_sending_newsletter ( CdtUtils::getParamPOST('cd_sending_newsletter') );	
				
		$oContactSendingNewsletter->setCd_contact ( CdtUtils::getParamPOST('cd_contact') );	
				
		$oContactSendingNewsletter->setCd_category ( CdtUtils::getParamPOST('cd_category') );	
				
		$oContactSendingNewsletter->setDt_date ( CdtUtils::getParamPOST('dt_date') );	
				
		$oContactSendingNewsletter->setDs_time ( CdtUtils::getParamPOST('ds_time') );	
				
		$oContactSendingNewsletter->setBl_sent ( CdtUtils::getParamPOST('bl_sent') );	
				
		$oContactSendingNewsletter->setDt_sent ( CdtUtils::getParamPOST('dt_sent') );	
				
		$oContactSendingNewsletter->setNu_hard ( CdtUtils::getParamPOST('nu_hard') );	
				
		$oContactSendingNewsletter->setNu_soft ( CdtUtils::getParamPOST('nu_soft') );	
				
		$oContactSendingNewsletter->setBl_processed ( CdtUtils::getParamPOST('bl_processed') );	
				
		$oContactSendingNewsletter->setBl_open ( CdtUtils::getParamPOST('bl_open') );	
		
		
		return $oContactSendingNewsletter;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oContactSendingNewsletter = CdtFormatUtils::ifEmpty($entity, new ContactSendingNewsletter());

		//parseamos la entity
		
				
		$xtpl->assign ( 'dt_date', stripslashes ( $oContactSendingNewsletter->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_DT_DATE );
				
		$xtpl->assign ( 'ds_time', stripslashes ( $oContactSendingNewsletter->getDs_time () ) );
		$xtpl->assign ( 'ds_time_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_DS_TIME );
				
		$xtpl->assign ( 'bl_sent', stripslashes ( $oContactSendingNewsletter->getBl_sent () ) );
		$xtpl->assign ( 'bl_sent_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_SENT );
				
		$xtpl->assign ( 'nu_hard', stripslashes ( $oContactSendingNewsletter->getNu_hard () ) );
		$xtpl->assign ( 'nu_hard_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_HARD );
				
		$xtpl->assign ( 'nu_soft', stripslashes ( $oContactSendingNewsletter->getNu_soft () ) );
		$xtpl->assign ( 'nu_soft_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_SOFT );
		
		
				
		$xtpl->assign ( 'cd_contact_sending_newsletter', stripslashes ( $oContactSendingNewsletter->getCd_contact_sending_newsletter () ) );
		$xtpl->assign ( 'cd_contact_sending_newsletter_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CONTACT_SENDING_NEWSLETTER );
		$xtpl->assign ( 'cd_contact_sending_newsletter_required', '*' );
		$xtpl->assign ( 'cd_contact_sending_newsletter_required_msg', BOL_MSG_CONTACTSENDINGNEWSLETTER_CD_CONTACT_SENDING_NEWSLETTER_REQUIRED );
				
		$xtpl->assign ( 'dt_sent', stripslashes ( $oContactSendingNewsletter->getDt_sent () ) );
		$xtpl->assign ( 'dt_sent_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_DT_SENT );
		$xtpl->assign ( 'dt_sent_required', '*' );
		$xtpl->assign ( 'dt_sent_required_msg', BOL_MSG_CONTACTSENDINGNEWSLETTER_DT_SENT_REQUIRED );
				
		$xtpl->assign ( 'bl_processed', stripslashes ( $oContactSendingNewsletter->getBl_processed () ) );
		$xtpl->assign ( 'bl_processed_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_PROCESSED );
		$xtpl->assign ( 'bl_processed_required', '*' );
		$xtpl->assign ( 'bl_processed_required_msg', BOL_MSG_CONTACTSENDINGNEWSLETTER_BL_PROCESSED_REQUIRED );
				
		$xtpl->assign ( 'bl_open', stripslashes ( $oContactSendingNewsletter->getBl_open () ) );
		$xtpl->assign ( 'bl_open_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_OPEN );
		$xtpl->assign ( 'bl_open_required', '*' );
		$xtpl->assign ( 'bl_open_required_msg', BOL_MSG_CONTACTSENDINGNEWSLETTER_BL_OPEN_REQUIRED );
		
		
		//parseamos las relaciones de la entity
		
		$xtpl->assign ( 'cd_sending_newsletter_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_SENDING_NEWSLETTER );
		$selected =  $oContactSendingNewsletter->getSendingNewsletter();
		
		$oFindObject = BOLComponentsFactory::getFindObjectSendingNewsletter( $selected, 'cd_sending_newsletter', true,  BOL_MSG_CONTACTSENDINGNEWSLETTER_CD_SENDING_NEWSLETTER_REQUIRED  );

		$xtpl->assign('sendingNewsletter_find', $oFindObject->show() );
		
		
		$xtpl->assign ( 'cd_contact_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CONTACT );
		$selected =  $oContactSendingNewsletter->getContact();
		
		$oFindObject = BOLComponentsFactory::getFindObjectContact( $selected, 'cd_contact', true,  BOL_MSG_CONTACTSENDINGNEWSLETTER_CD_CONTACT_REQUIRED  );

		$xtpl->assign('contact_find', $oFindObject->show() );
		
		
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CATEGORY );
		$selected =  $oContactSendingNewsletter->getCategory();
		
		$oFindObject = BOLComponentsFactory::getFindObjectCategory( $selected, 'cd_category', true,  BOL_MSG_CONTACTSENDINGNEWSLETTER_CD_CATEGORY_REQUIRED  );

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
	
	
	protected function parseSendingNewsletter($selected, XTemplate $xtpl ){
	
		$manager = new SendingNewsletterManager();
		$oCriteria = new CdtSearchCriteria();
		$sendingnewsletters = $manager->getSendingNewsletters( $oCriteria );
		
		$xtpl->assign ( 'lbl_select', BOL_LBL_SELECT );
		
		foreach($sendingnewsletters as $key => $oSendingNewsletter) {
		
			$xtpl->assign ( 'ds_sendingNewsletter', $oSendingNewsletter->getCd_sending_newsletter() );
			$xtpl->assign ( 'cd_sendingNewsletter', FormatUtils::selected($oSendingNewsletter->getCd_sending_newsletter(), $selected ) );
			
			$xtpl->parse ( 'main.sendingnewsletters_option' );
		}	
	}
	
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
