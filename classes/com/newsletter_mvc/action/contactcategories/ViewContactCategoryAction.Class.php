<?php 

/**
 * Acci�n para visualizar un contactCategory.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewContactCategoryAction extends CdtOutputAction{

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
		
		$cd_contactCategory = CdtUtils::getParam('id');
			
		if (!empty( $cd_contactCategory )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact_category', $cd_contactCategory, '=');
			
			$manager = new ContactCategoryManager();
			$oContactCategory = $manager->getContactCategory( $oCriteria );
			
		}else{
		
			$oContactCategory = parent::getEntity();
		
		}
		
		//parseamos contactCategory.
		$this->parseEntity( $xtpl, $oContactCategory );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTCATEGORY_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_CONTACTCATEGORY_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oContactCategory entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oContactCategory){ 

				
		$xtpl->assign ( 'cd_contact_category', stripslashes ( $oContactCategory->getCd_contact_category () ) );
		$xtpl->assign ( 'cd_contact_category_label', BOL_LBL_CONTACTCATEGORY_CD_CONTACT_CATEGORY );
				
		$xtpl->assign ( 'cd_contact', stripslashes ( $oContactCategory->getCd_contact () ) );
		$xtpl->assign ( 'cd_contact_label', BOL_LBL_CONTACTCATEGORY_CD_CONTACT );
				
		$xtpl->assign ( 'cd_category', stripslashes ( $oContactCategory->getCd_category () ) );
		$xtpl->assign ( 'cd_category_label', BOL_LBL_CONTACTCATEGORY_CD_CATEGORY );
		
		
	}
}
