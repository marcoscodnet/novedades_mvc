<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un contactCategory.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateContactCategoryInitAction extends EditContactCategoryInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oContactCategory = null;

		//recuperamos dado su identifidor.
		$cd_contactCategory = CdtUtils::getParam('id');
			
		if (!empty( $cd_contactCategory )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact_category', $cd_contactCategory, '=');
			
			$manager = new ContactCategoryManager();
			$oContactCategory = $manager->getContactCategory( $oCriteria );
			
		}else{
		
			$oContactCategory = parent::getEntity();
		
		}
		return $oContactCategory ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditContactCategoryInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_contactcategory";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACTCATEGORY_TITLE_UPDATE;
	}

}
