<?php 

/** 
 * Factory para Contact
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Contact');
		$oContact = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oContact;
	}
} 
?>
