<?php 

/** 
 * Factory para Category
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class CategoryFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Category');
		$oCategory = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oCategory;
	}
} 
?>
