<?php 

/** 
 * Factory para ImageCategory
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageCategoryFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('ImageCategory');
		$oImageCategory = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oImageCategory;
	}
} 
?>
