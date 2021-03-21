<?php 

/** 
 * Factory para Template
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class TemplateFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Template');
		$oTemplate = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oTemplate;
	}
} 
?>
