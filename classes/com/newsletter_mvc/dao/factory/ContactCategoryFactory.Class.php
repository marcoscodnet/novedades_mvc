<?php 

/** 
 * Factory para ContactCategory
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactCategoryFactory extends CdtGenericFactory{ 

	public function build($next) { 
		
		$this->setClassName('ContactCategory');
		$oContactCategory = parent::build($next);
		
		if(array_key_exists('ds_name',$next)){
			
			$oFactory = new ContactFactory();
			$oContactCategory->setContact( $oFactory->build($next) );
		}
		
		if(array_key_exists('ds_category',$next)){
			
			$oFactory = new CategoryFactory();
			$oContactCategory->setCategory( $oFactory->build($next) );
		}
		 
		return $oContactCategory;
	}
} 
?>
