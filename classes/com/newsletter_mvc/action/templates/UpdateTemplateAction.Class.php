<?php 

/**
 * Acción para modificar template.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateTemplateAction extends EditTemplateAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new TemplateManager();
		$manager->updateTemplate( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_template_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_template_error';
	}

	
}
