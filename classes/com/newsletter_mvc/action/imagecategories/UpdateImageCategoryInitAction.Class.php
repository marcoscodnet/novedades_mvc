<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un imageCategory.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateImageCategoryInitAction extends EditImageCategoryInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oImageCategory = null;

		//recuperamos dado su identifidor.
		$cd_imageCategory = CdtUtils::getParam('id');
			
		if (!empty( $cd_imageCategory )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_image_category', $cd_imageCategory, '=');
			
			$manager = new ImageCategoryManager();
			$oImageCategory = $manager->getImageCategory( $oCriteria );
			
		}else{
		
			$oImageCategory = parent::getEntity();
		
		}
		return $oImageCategory ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditImageCategoryInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_imagecategory";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_IMAGECATEGORY_TITLE_UPDATE;
	}

}
