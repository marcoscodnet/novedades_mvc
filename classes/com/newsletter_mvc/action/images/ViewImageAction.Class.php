<?php 

/**
 * Acci�n para visualizar un image.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewImageAction extends CdtOutputAction{

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
		
		$cd_image = CdtUtils::getParam('id');
			
		if (!empty( $cd_image )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_image', $cd_image, '=');
			
			$manager = new ImageManager();
			$oImage = $manager->getImage( $oCriteria );
			
		}else{
		
			$oImage = parent::getEntity();
		
		}
		
		//parseamos image.
		$this->parseEntity( $xtpl, $oImage );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_IMAGE_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_IMAGE_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oImage entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oImage){ 

				
		$xtpl->assign ( 'cd_image', stripslashes ( $oImage->getCd_image () ) );
		$xtpl->assign ( 'cd_image_label', BOL_LBL_IMAGE_CD_IMAGE );
				
		$xtpl->assign ( 'cd_image_category', stripslashes ( $oImage->getCd_image_category () ) );
		$xtpl->assign ( 'cd_image_category_label', BOL_LBL_IMAGE_CD_IMAGE_CATEGORY );
				
		$xtpl->assign ( 'cd_template', stripslashes ( $oImage->getCd_template () ) );
		$xtpl->assign ( 'cd_template_label', BOL_LBL_IMAGE_CD_TEMPLATE );
				
		$xtpl->assign ( 'ds_image', stripslashes ( $oImage->getDs_image () ) );
		$xtpl->assign ( 'ds_image_label', BOL_LBL_IMAGE_DS_IMAGE );
				
		$xtpl->assign ( 'nu_size', stripslashes ( $oImage->getNu_size () ) );
		$xtpl->assign ( 'nu_size_label', BOL_LBL_IMAGE_NU_SIZE );
				
		$xtpl->assign ( 'ds_type', stripslashes ( $oImage->getDs_type () ) );
		$xtpl->assign ( 'ds_type_label', BOL_LBL_IMAGE_DS_TYPE );
				
		$xtpl->assign ( 'dt_date', stripslashes ( $oImage->getDt_date () ) );
		$xtpl->assign ( 'dt_date_label', BOL_LBL_IMAGE_DT_DATE );
		
		
	}
}
