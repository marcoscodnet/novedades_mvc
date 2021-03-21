<?php 

/**
 * Acci�n para visualizar un contactSendingNewsletter.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewContactSendingNewsletterAction extends CdtOutputAction{

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
		
		$cd_contactSendingNewsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_contactSendingNewsletter )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact_sending_newsletter', $cd_contactSendingNewsletter, '=');
			
			$manager = new ContactSendingNewsletterManager();
			$oContactSendingNewsletter = $manager->getContactSendingNewsletter( $oCriteria );
			
		}else{
		
			$oContactSendingNewsletter = parent::getEntity();
		
		}
		
		//parseamos contactSendingNewsletter.
		$this->parseEntity( $xtpl, $oContactSendingNewsletter );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_CONTACTSENDINGNEWSLETTER_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oContactSendingNewsletter entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oContactSendingNewsletter){ 

				
		$xtpl->assign ( 'cd_contact_sending_newsletter', stripslashes ( $oContactSendingNewsletter->getCd_contact_sending_newsletter () ) );
		$xtpl->assign ( 'cd_contact_sending_newsletter_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CONTACT_SENDING_NEWSLETTER );
				
		$xtpl->assign ( 'cd_sending_newsletter', stripslashes ( $oContactSendingNewsletter->getCd_sending_newsletter () ) );
		$xtpl->assign ( 'cd_sending_newsletter_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_SENDING_NEWSLETTER );
				
		$xtpl->assign ( 'cd_contact', stripslashes ( $oContactSendingNewsletter->getCd_contact () ) );
		$xtpl->assign ( 'cd_contact_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CONTACT );
				
		$xtpl->assign ( 'cd_category', stripslashes ( $oContactSendingNewsletter->getCd_category () ) );
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CATEGORY );
				
		$xtpl->assign ( 'dt_date', stripslashes ( $oContactSendingNewsletter->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_DT_DATE );
				
		$xtpl->assign ( 'ds_time', stripslashes ( $oContactSendingNewsletter->getDs_time () ) );
		$xtpl->assign ( 'ds_time_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_DS_TIME );
				
		$xtpl->assign ( 'bl_sent', stripslashes ( $oContactSendingNewsletter->getBl_sent () ) );
		$xtpl->assign ( 'bl_sent_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_SENT );
				
		$xtpl->assign ( 'dt_sent', stripslashes ( $oContactSendingNewsletter->getDt_sent () ) );
		$xtpl->assign ( 'dt_sent_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_DT_SENT );
				
		$xtpl->assign ( 'nu_hard', stripslashes ( $oContactSendingNewsletter->getNu_hard () ) );
		$xtpl->assign ( 'nu_hard_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_HARD );
				
		$xtpl->assign ( 'nu_soft', stripslashes ( $oContactSendingNewsletter->getNu_soft () ) );
		$xtpl->assign ( 'nu_soft_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_SOFT );
				
		$xtpl->assign ( 'bl_processed', stripslashes ( $oContactSendingNewsletter->getBl_processed () ) );
		$xtpl->assign ( 'bl_processed_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_PROCESSED );
				
		$xtpl->assign ( 'bl_open', stripslashes ( $oContactSendingNewsletter->getBl_open () ) );
		$xtpl->assign ( 'bl_open_label', BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_OPEN );
		
		
	}
}
