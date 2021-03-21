<?php 

/** 
 * Factory para Image
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Image');
		$oImage = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oImage;
	}
} 
?>
