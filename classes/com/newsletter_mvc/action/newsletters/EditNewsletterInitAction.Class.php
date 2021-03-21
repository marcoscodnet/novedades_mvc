<?php 

/**
 * Acci�n para inicializar el contexto para editar newsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditNewsletterInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_NEWSLETTER_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el newsletter a modificar.
		$oNewsletter = new Newsletter ( );
	
				
		$oNewsletter->setCd_newsletter ( CdtUtils::getParamPOST('cd_newsletter') );	
				
		$oNewsletter->setCd_user ( CdtUtils::getParamSESSION('cd_user') );	
				
		$oNewsletter->setCd_template (  CdtUtils::getParamPOST('cd_template') );	
				
		$oNewsletter->setDt_date ( BOLUtils::formatDateToPersist(CdtUtils::getParamPOST('dt_date') ));	
				
		$oNewsletter->setDs_newsletter ( CdtUtils::getParamPOST('ds_newsletter') );	
				
		$oNewsletter->setDs_text ( CdtUtils::getParamPOST('ds_text','',false) );	
				
	
				
		$oNewsletter->setDs_mail ( CdtUtils::getParamPOST('ds_mail') );	
				
		$oNewsletter->setCd_status (  CdtUtils::getParamPOST('cd_status') );		
				
		$oNewsletter->setBl_twitter ( CdtUtils::getParamPOST('bl_twitter') );	
				
		$oNewsletter->setBl_facebook ( CdtUtils::getParamPOST('bl_facebook') );	
		
		$oNewsletter->setDs_linkheader ( CdtUtils::getParamPOST('ds_linkheader') );	
		
		$oNewsletter->setDs_linkfooter ( CdtUtils::getParamPOST('ds_linkfooter') );
		
		$oNewsletter->setBl_linkedin ( CdtUtils::getParamPOST('bl_linkedin') );	
		
		return $oNewsletter;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		if (isset($_SESSION['newsletter_session'])) {
			$oNewsletter = unserialize($_SESSION['newsletter_session']);
			$xtpl->assign ( 'viewTemp', 'window.open("doAction?action=view_newsletter");');
		}
		elseif( CdtUtils::getParam('id')){
			$cd_newsletter = CdtUtils::getParam('id');
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_newsletter', $cd_newsletter, '=');
			
			$manager = new NewsletterManager();
			$oNewsletter = $manager->getNewsletter( $oCriteria );
			
		}
		else{
			$oNewsletter = CdtFormatUtils::ifEmpty($entity, new Newsletter());
			
		}
		//unset($_SESSION['newsletter_session']);
		//parseamos la entity
		
		//$cd_newsletter = ( CdtUtils::getParam('id'))?'':$oNewsletter->getCd_newsletter();
		$cd_newsletter = $oNewsletter->getCd_newsletter();
		
		$xtpl->assign ( 'WEB_PATH',  WEB_PATH);
		
		$xtpl->assign ( 'ds_newsletter', stripslashes ( $oNewsletter->getDs_newsletter () ) );
		$xtpl->assign ( 'ds_newsletter_label', BOL_LBL_NEWSLETTER_DS_NEWSLETTER );
		$xtpl->assign ( 'ds_newsletter_required', '*' );
		$xtpl->assign ( 'ds_newsletter_required_msg', BOL_MSG_NEWSLETTER_DS_NEWSLETTER_REQUIRED );
				
		$xtpl->assign ( 'ds_text', stripslashes ( $oNewsletter->getDs_text () ) );
		$xtpl->assign ( 'ds_text_label', BOL_LBL_NEWSLETTER_DS_TEXT );
		
				
		
				
		$xtpl->assign ( 'ds_mail', stripslashes ( $oNewsletter->getDs_mail () ) );
		$xtpl->assign ( 'ds_mail_label', BOL_LBL_NEWSLETTER_DS_MAIL );
		$xtpl->assign ( 'ds_mail_required', '*' );
		$xtpl->assign ( 'ds_mail_required_msg', BOL_MSG_NEWSLETTER_DS_MAIL_REQUIRED );
		$xtpl->assign ( 'ds_mail_mail_msg', CDT_SECURE_MSG_EMAIL_INVALID );
		
		
				
		$xtpl->assign ( 'cd_newsletter', $cd_newsletter );
		$xtpl->assign ( 'cd_newsletter_label', BOL_LBL_NEWSLETTER_CD_NEWSLETTER );
		$xtpl->assign ( 'cd_newsletter_required', '*' );
		$xtpl->assign ( 'cd_newsletter_required_msg', BOL_MSG_NEWSLETTER_CD_NEWSLETTER_REQUIRED );
				
		$xtpl->assign ( 'dt_date', BOLUtils::formatDateToView  ( $oNewsletter->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_NEWSLETTER_DT_DATE );
		$xtpl->assign ( 'dt_date_required', '*' );
		$xtpl->assign ( 'dt_date_required_msg', BOL_MSG_NEWSLETTER_DT_DATE_REQUIRED );
				
		$xtpl->assign ( 'bl_twitter', stripslashes ( $oNewsletter->getBl_twitter () ) );
		$xtpl->assign ( 'bl_twitter_label', BOL_LBL_NEWSLETTER_BL_TWITTER );
		
		if ($oNewsletter->getBl_twitter() == 1) {
            $xtpl->assign('checked_bl_twitter', 'checked');
        } else {
            $xtpl->assign('checked_bl_twitter', '');
        }
				
		$xtpl->assign ( 'bl_facebook', stripslashes ( $oNewsletter->getBl_facebook () ) );
		$xtpl->assign ( 'bl_facebook_label', BOL_LBL_NEWSLETTER_BL_FACEBOOK );
		
		if ($oNewsletter->getBl_facebook() == 1) {
            $xtpl->assign('checked_bl_facebook', 'checked');
        } else {
            $xtpl->assign('checked_bl_facebook', '');
        }
		
        $xtpl->assign ( 'ds_linkheader', stripslashes ( $oNewsletter->getDs_linkheader () ) );
		$xtpl->assign ( 'ds_linkheader_label', BOL_LBL_NEWSLETTER_DS_LINKHEADER );
		$xtpl->assign ( 'ds_linkheader_url_msg', BOL_MSG_URL_INVALID );
		
		$xtpl->assign ( 'ds_linkfooter', stripslashes ( $oNewsletter->getDs_linkfooter () ) );
		$xtpl->assign ( 'ds_linkfooter_label', BOL_LBL_NEWSLETTER_DS_LINKFOOTER );
		$xtpl->assign ( 'ds_linkfooter_url_msg', BOL_MSG_URL_INVALID );
		
		$xtpl->assign ( 'bl_linkedin', stripslashes ( $oNewsletter->getBl_linkedin () ) );
		$xtpl->assign ( 'bl_linkedin_label', BOL_LBL_NEWSLETTER_BL_LINKEDIN );
		
		if ($oNewsletter->getBl_linkedin() == 1) {
            $xtpl->assign('checked_bl_linkedin', 'checked');
        } else {
            $xtpl->assign('checked_bl_linkedin', '');
        }
		
		$xtpl->assign ( 'cd_template', stripslashes ( $oNewsletter->getCd_template () ) );
		$xtpl->assign ( 'cd_status', stripslashes ( $oNewsletter->getCd_status () ) );
		
		$xtpl->assign ( 'ds_speech', BOL_MSG_NEWSLETTER_SPEECH );
		
		$xtpl->assign ( 'imgHeader', stripslashes ( $oNewsletter->getImg_header()) );
		$xtpl->assign ( 'imgFooter', stripslashes ( $oNewsletter->getImg_footer()) );
		
		/*$xtpl->assign ( BOL_LBL_NEWSLETTER_CONTACT_NAME, BOL_LBL_NEWSLETTER_CONTACT_NAME_KEYS);
		$xtpl->assign ( BOL_LBL_NEWSLETTER_COMPANY_NAME, BOL_LBL_NEWSLETTER_COMPANY_NAME_KEYS);*/
		
		
		
		//parseamos el action submit.
		$xtpl->assign('submit',  $this->getSubmitAction() );
		
		$xtpl->assign ( 'lbl_save', BOL_LBL_SAVE);
		$xtpl->assign ( 'lbl_preview', BOL_LBL_PREVIEW);
		$xtpl->assign ( 'name_preview', BOL_NAME_PREVIEW);
		$xtpl->assign ( 'lbl_cancel', BOL_LBL_CANCEL);
		$xtpl->assign ( 'msg_required_fields', BOL_MSG_REQUIRED_FIELDS);
		
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected abstract function getSubmitAction();
	
	
	
	

}
