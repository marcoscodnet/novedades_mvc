<?php 

/** 
 * Factory para NewsletterImage
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterImageFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('NewsletterImage');
		$oNewsletterImage = parent::build($next);
		
		 //TODO foreign keys 
		 
		return $oNewsletterImage;
	}
} 
?>
