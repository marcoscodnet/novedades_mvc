<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un image.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateImageInitAction extends EditImageInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oImage = null;

		//recuperamos dado su identifidor.
		$cd_image = CdtUtils::getParam('id');
			
		if (!empty( $cd_image )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_image', $cd_image, '=');
			
			$manager = new ImageManager();
			$oImage = $manager->getImage( $oCriteria );
			
		}else{
		
			$oImage = parent::getEntity();
		
		}
		return $oImage ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditImageInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_image";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_IMAGE_TITLE_UPDATE;
	}

}
