<?php 

/**
 * Acci�n para inicializar el contexto para editar sendingNewsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditSendingNewsletterInitAction  extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( BOL_TEMPLATE_SENDINGNEWSLETTER_EDIT );		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el sendingNewsletter a modificar.
		$oSendingNewsletter = new SendingNewsletter ( );
	
				
		$oSendingNewsletter->setCd_sending_newsletter ( CdtUtils::getParamPOST('cd_sending_newsletter') );	
				
		$oSendingNewsletter->setCd_newsletter ( CdtUtils::getParamPOST('cd_newsletter') );	
				
		$oSendingNewsletter->setDt_date ( CdtUtils::getParamPOST('dt_date') );	
				
		$oSendingNewsletter->setDs_time ( CdtUtils::getParamPOST('ds_time') );	
				
		$oSendingNewsletter->setBl_sent ( CdtUtils::getParamPOST('bl_sent') );	
		
		
		return $oSendingNewsletter;
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oSendingNewsletter = CdtFormatUtils::ifEmpty($entity, new SendingNewsletter());

		//parseamos la entity
		
				
		$xtpl->assign ( 'bl_sent', stripslashes ( $oSendingNewsletter->getBl_sent () ) );
		$xtpl->assign ( 'bl_sent_label', BOL_LBL_SENDINGNEWSLETTER_BL_SENT );
		
		
				
		$xtpl->assign ( 'cd_sending_newsletter', stripslashes ( $oSendingNewsletter->getCd_sending_newsletter () ) );
		$xtpl->assign ( 'cd_sending_newsletter_label', BOL_LBL_SENDINGNEWSLETTER_CD_SENDING_NEWSLETTER );
		$xtpl->assign ( 'cd_sending_newsletter_required', '*' );
		$xtpl->assign ( 'cd_sending_newsletter_required_msg', BOL_MSG_SENDINGNEWSLETTER_CD_SENDING_NEWSLETTER_REQUIRED );
				
		$xtpl->assign ( 'cd_newsletter', stripslashes ( $oSendingNewsletter->getCd_newsletter () ) );
		$xtpl->assign ( 'cd_newsletter_label', BOL_LBL_SENDINGNEWSLETTER_CD_NEWSLETTER );
		$xtpl->assign ( 'cd_newsletter_required', '*' );
		$xtpl->assign ( 'cd_newsletter_required_msg', BOL_MSG_SENDINGNEWSLETTER_CD_NEWSLETTER_REQUIRED );
				
		$xtpl->assign ( 'dt_date', stripslashes ( $oSendingNewsletter->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_SENDINGNEWSLETTER_DT_DATE );
		$xtpl->assign ( 'dt_date_required', '*' );
		$xtpl->assign ( 'dt_date_required_msg', BOL_MSG_SENDINGNEWSLETTER_DT_DATE_REQUIRED );
				
		$xtpl->assign ( 'ds_time', stripslashes ( $oSendingNewsletter->getDs_time () ) );
		$xtpl->assign ( 'ds_time_label', BOL_LBL_SENDINGNEWSLETTER_DS_TIME );
		$xtpl->assign ( 'ds_time_required', '*' );
		$xtpl->assign ( 'ds_time_required_msg', BOL_MSG_SENDINGNEWSLETTER_DS_TIME_REQUIRED );
		
		
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
