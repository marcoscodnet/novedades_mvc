<?php 

/** 
 * Factory para SendingNewsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class SendingNewsletterFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('SendingNewsletter');
		$oSendingNewsletter = parent::build($next);
		
		if(array_key_exists('ds_newsletter',$next)){
			
			$oFactory = new NewsletterFactory();
			$oSendingNewsletter->setNewsletter( $oFactory->build($next) );
		}
		
		if(array_key_exists('ds_status',$next)){
			
			$oFactory = new StatusFactory();
			$oSendingNewsletter->setoStatus( $oFactory->build($next) );
		}
		 
		return $oSendingNewsletter;
	}
} 
?>
