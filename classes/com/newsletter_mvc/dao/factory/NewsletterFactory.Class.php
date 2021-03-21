<?php 

/** 
 * Factory para Newsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Newsletter');
		$oNewsletter = parent::build($next);
		
		if(array_key_exists('ds_status',$next)){
			
			$oFactory = new StatusFactory();
			$oNewsletter->setStatus( $oFactory->build($next) );
		}
		
		if(array_key_exists('ds_path',$next)){
			
			$oFactory = new TemplateFactory();
			$oNewsletter->setTemplate( $oFactory->build($next) );
		}
		 
		return $oNewsletter;
	}
} 
?>
