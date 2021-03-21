<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un category.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateCategoryInitAction extends EditCategoryInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oCategory = null;

		//recuperamos dado su identifidor.
		$cd_category = CdtUtils::getParam('id');
			
		if (!empty( $cd_category )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_category', $cd_category, '=');
			
			$manager = new CategoryManager();
			$oCategory = $manager->getCategory( $oCriteria );
			
		}else{
		
			$oCategory = parent::getEntity();
		
		}
		return $oCategory ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditCategoryInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_category";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CATEGORY_TITLE_UPDATE;
	}

}
