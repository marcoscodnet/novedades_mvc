<?php 

/**
 * Acción para dar de alta un newsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddNewsletterAction extends EditNewsletterAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		
		if (CdtUtils::getParamPOST(BOL_NAME_PREVIEW) ) {
			$_SESSION['newsletter_session']=serialize($oEntity); 
		}
		else {
			$manager = new NewsletterManager();
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_template', BOL_NEWSLETTER_CD_TEMPLATE, '=');
			
			$managerTemplate = new TemplateManager();
			$oTemplate = $managerTemplate->getTemplate( $oCriteria );
			$oEntity->setImg_header($oTemplate->getImg_header());
			$oEntity->setImg_footer($oTemplate->getImg_footer());
			$manager->addNewsletter( $oEntity );
			/*$dir = APP_PATH.'css/templates/images/'.$oEntity->getCd_newsletter ().'/';
			if (!file_exists($dir)) mkdir($dir, 0777); 
			copy(APP_PATH.'css/templates/images/'.$oTemplate->getImg_header(), $dir.$oEntity->getImg_header());
			copy(APP_PATH.'css/templates/images/'.$oTemplate->getImg_footer(), $dir.$oEntity->getImg_footer());*/
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		if (CdtUtils::getParamPOST(BOL_NAME_PREVIEW) ) {
			$this->setDs_forward_params("temp=1");
			//$_GET['temp']=1;
			return 'add_newsletter_temp';
		}
		else {
			return 'add_newsletter_success';
		}
		
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_newsletter_error';
	}
		
	
}
