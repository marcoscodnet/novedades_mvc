<?php 

/** 
 * Factory para Item
 *  
 * @author Marcos
 * @since 13/07/2015
 */ 
class ItemFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('Item');
		$oItem = parent::build($next);
		
		if(array_key_exists('ds_newsletter',$next)){
			
			$oFactory = new NewsletterFactory();
			$oItem->setNewsletter( $oFactory->build($next) );
		}
		 
		return $oItem;
	}
} 
?>
