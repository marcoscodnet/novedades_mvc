<?php 

/**
 * Acci�n para visualizar un imageCategory.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewImageCategoryAction extends CdtOutputAction{

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
		
		$cd_imageCategory = CdtUtils::getParam('id');
			
		if (!empty( $cd_imageCategory )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_image_category', $cd_imageCategory, '=');
			
			$manager = new ImageCategoryManager();
			$oImageCategory = $manager->getImageCategory( $oCriteria );
			
		}else{
		
			$oImageCategory = parent::getEntity();
		
		}
		
		//parseamos imageCategory.
		$this->parseEntity( $xtpl, $oImageCategory );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_IMAGECATEGORY_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_IMAGECATEGORY_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oImageCategory entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oImageCategory){ 

				
		$xtpl->assign ( 'cd_image_category', stripslashes ( $oImageCategory->getCd_image_category () ) );
		$xtpl->assign ( 'cd_image_category_label', BOL_LBL_IMAGECATEGORY_CD_IMAGE_CATEGORY );
				
		$xtpl->assign ( 'ds_image_category', stripslashes ( $oImageCategory->getDs_image_category () ) );
		$xtpl->assign ( 'ds_image_category_label', BOL_LBL_IMAGECATEGORY_DS_IMAGE_CATEGORY );
		
		
	}
}
