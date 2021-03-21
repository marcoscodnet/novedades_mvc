<?php 

/**
 * Acci�n para editar newsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditNewsletterAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el newsletter a modificar.
		$oNewsletter = new Newsletter ( );
		
				
		$oNewsletter->setCd_newsletter ( CdtUtils::getParamPOST('cd_newsletter') );	
				
		$oUser = CdtSecureUtils::getUserLogged();
		$oNewsletter->setCd_user ( $oUser->getCd_user() );	
				
		$oNewsletter->setCd_template ( BOL_NEWSLETTER_CD_TEMPLATE);	
				
		$oNewsletter->setDt_date ( BOLUtils::formatDateToPersist(CdtUtils::getParamPOST('dt_date') ));	
				
		$oNewsletter->setDs_newsletter ( CdtUtils::getParamPOST('ds_newsletter') );	
				
		$oNewsletter->setDs_text ( CdtUtils::getParamPOST('ds_text','',false) );	
				
	
				
		$oNewsletter->setDs_mail ( CdtUtils::getParamPOST('ds_mail') );	
				
		$oNewsletter->setCd_status ( BOL_NEWSLETTER_CD_STATUS_DEFAULT);		
				
		$oNewsletter->setBl_twitter ( CdtUtils::getParamPOST('bl_twitter') );	
				
		$oNewsletter->setBl_facebook ( CdtUtils::getParamPOST('bl_facebook') );	
		
		$oNewsletter->setDs_linkheader ( CdtUtils::getParamPOST('ds_linkheader') );	
		
		$oNewsletter->setDs_linkfooter ( CdtUtils::getParamPOST('ds_linkfooter') );
		
		$oNewsletter->setBl_linkedin ( CdtUtils::getParamPOST('bl_linkedin') );	
		
		$oNewsletter->setImg_header ( CdtUtils::getParamPOST('imgHeader') );
		
		$oNewsletter->setImg_footer ( CdtUtils::getParamPOST('imgFooter') );
		
					
		return $oNewsletter;
	}
	
		
}
