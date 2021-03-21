<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un template.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateTemplateInitAction extends EditTemplateInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oTemplate = null;

		//recuperamos dado su identifidor.
		$cd_template = CdtUtils::getParam('id');
			
		if (!empty( $cd_template )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_template', $cd_template, '=');
			
			$manager = new TemplateManager();
			$oTemplate = $manager->getTemplate( $oCriteria );
			
		}else{
		
			$oTemplate = parent::getEntity();
		
		}
		return $oTemplate ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditTemplateInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_template";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_TEMPLATE_TITLE_UPDATE;
	}

}
