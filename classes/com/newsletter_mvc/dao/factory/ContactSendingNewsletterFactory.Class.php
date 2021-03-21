<?php 

/** 
 * Factory para ContactSendingNewsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactSendingNewsletterFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('ContactSendingNewsletter');
		$oContactSendingNewsletter = parent::build($next);
		
		if(array_key_exists('ds_category',$next)){
			
			$oFactory = new CategoryFactory();
			$oContactSendingNewsletter->setCategory( $oFactory->build($next) );
		}
		
		if(array_key_exists('ds_name',$next)){
			
			$oFactory = new ContactFactory();
			$oContactSendingNewsletter->setContact( $oFactory->build($next) );
		}
		
		if(array_key_exists('ds_newsletter',$next)){
			
			$oFactory = new NewsletterFactory();
			$oContactSendingNewsletter->getSendingNewsletter()->setNewsletter( $oFactory->build($next) );
		}
		 
		return $oContactSendingNewsletter;
	}
} 
?>
