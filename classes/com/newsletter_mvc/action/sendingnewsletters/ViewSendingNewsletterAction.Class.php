<?php 

/**
 * Acci�n para visualizar un sendingNewsletter.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewSendingNewsletterAction extends CdtOutputAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout(){
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputContent();
	 */
	protected function getOutputContent(){
			
		$xtpl = $this->getXTemplate ();
		
		$cd_sendingNewsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_sendingNewsletter )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_sending_newsletter', $cd_sendingNewsletter, '=');
			
			$manager = new SendingNewsletterManager();
			$oSendingNewsletter = $manager->getSendingNewsletter( $oCriteria );
			
		}else{
		
			$oSendingNewsletter = parent::getEntity();
		
		}
		
		//parseamos sendingNewsletter.
		$this->parseEntity( $xtpl, $oSendingNewsletter );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_SENDINGNEWSLETTER_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_SENDINGNEWSLETTER_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oSendingNewsletter entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oSendingNewsletter){ 

				
		$xtpl->assign ( 'cd_sending_newsletter', stripslashes ( $oSendingNewsletter->getCd_sending_newsletter () ) );
		$xtpl->assign ( 'cd_sending_newsletter_label', BOL_LBL_SENDINGNEWSLETTER_CD_SENDING_NEWSLETTER );
				
		$xtpl->assign ( 'cd_newsletter', stripslashes ( $oSendingNewsletter->getCd_newsletter () ) );
		$xtpl->assign ( 'cd_newsletter_label', BOL_LBL_SENDINGNEWSLETTER_CD_NEWSLETTER );
				
		$xtpl->assign ( 'dt_date', stripslashes ( $oSendingNewsletter->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_SENDINGNEWSLETTER_DT_DATE );
				
		$xtpl->assign ( 'ds_time', stripslashes ( $oSendingNewsletter->getDs_time () ) );
		$xtpl->assign ( 'ds_time_label', BOL_LBL_SENDINGNEWSLETTER_DS_TIME );
				
		$xtpl->assign ( 'bl_sent', stripslashes ( $oSendingNewsletter->getBl_sent () ) );
		$xtpl->assign ( 'bl_sent_label', BOL_LBL_SENDINGNEWSLETTER_BL_SENT );
		
		
	}
}
