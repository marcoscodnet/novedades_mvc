<?php 

/** 
 * Factory para Status
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class StatusFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Status');
		$oStatus = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oStatus;
	}
} 
?>
