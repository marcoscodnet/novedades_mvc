<?php 

/**
 * Acción para dar de alta un template.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddTemplateAction extends EditTemplateAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = new TemplateManager();
		$manager->addTemplate( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_template_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'add_template_error';
	}
		
	
}
