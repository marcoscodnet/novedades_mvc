<?php 

/**
 * Acci�n para visualizar un category.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewCategoryAction extends CdtOutputAction{

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
		
		$cd_category = CdtUtils::getParam('id');
			
		if (!empty( $cd_category )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_category', $cd_category, '=');
			
			$manager = new CategoryManager();
			$oCategory = $manager->getCategory( $oCriteria );
			
		}else{
		
			$oCategory = parent::getEntity();
		
		}
		
		//parseamos category.
		$this->parseEntity( $xtpl, $oCategory );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CATEGORY_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_CATEGORY_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oCategory entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oCategory){ 

				
		$xtpl->assign ( 'cd_category', stripslashes ( $oCategory->getCd_category () ) );
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CATEGORY_CD_CATEGORY );
				
		$xtpl->assign ( 'ds_category', stripslashes ( $oCategory->getDs_category () ) );
		$xtpl->assign ( 'ds_category_label', BOL_LBL_CATEGORY_DS_CATEGORY );
		
		
	}
}
