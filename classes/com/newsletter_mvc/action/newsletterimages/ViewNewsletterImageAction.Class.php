<?php 

/**
 * Acci�n para visualizar un newsletterImage.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewNewsletterImageAction extends CdtOutputAction{

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
		
		$cd_newsletterImage = CdtUtils::getParam('id');
			
		if (!empty( $cd_newsletterImage )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_newsletter_image', $cd_newsletterImage, '=');
			
			$manager = new NewsletterImageManager();
			$oNewsletterImage = $manager->getNewsletterImage( $oCriteria );
			
		}else{
		
			$oNewsletterImage = parent::getEntity();
		
		}
		
		//parseamos newsletterImage.
		$this->parseEntity( $xtpl, $oNewsletterImage );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_NEWSLETTERIMAGE_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_NEWSLETTERIMAGE_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oNewsletterImage entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oNewsletterImage){ 

				
		$xtpl->assign ( 'cd_newsletter_image', stripslashes ( $oNewsletterImage->getCd_newsletter_image () ) );
		$xtpl->assign ( 'cd_newsletter_image_label', BOL_LBL_NEWSLETTERIMAGE_CD_NEWSLETTER_IMAGE );
				
		$xtpl->assign ( 'ds_newsletter_image', stripslashes ( $oNewsletterImage->getDs_newsletter_image () ) );
		$xtpl->assign ( 'ds_newsletter_image_label', BOL_LBL_NEWSLETTERIMAGE_DS_NEWSLETTER_IMAGE );
				
		$xtpl->assign ( 'ds_path', stripslashes ( $oNewsletterImage->getDs_path () ) );
		$xtpl->assign ( 'ds_path_label', BOL_LBL_NEWSLETTERIMAGE_DS_PATH );
				
		$xtpl->assign ( 'cd_newsletter', stripslashes ( $oNewsletterImage->getCd_newsletter () ) );
		$xtpl->assign ( 'cd_newsletter_label', BOL_LBL_NEWSLETTERIMAGE_CD_NEWSLETTER );
				
		$xtpl->assign ( 'nu_order', stripslashes ( $oNewsletterImage->getNu_order () ) );
		$xtpl->assign ( 'nu_order_label', BOL_LBL_NEWSLETTERIMAGE_NU_ORDER );
		
		
	}
}
