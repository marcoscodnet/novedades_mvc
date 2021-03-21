<?php 

/**
 * 
 * 
 * @author marcos
 * @since 26-10-2012
 * 
 */
class UpdateSubscriptionAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el contact a modificar.
		$oContact = new Contact ( );
		$oContact->setDs_mail ( CdtUtils::getParamPOST('ds_mail') );	
				
		$oCategory = new Category ( );
		$oCategory->setCd_category( CdtUtils::getParamPOST('cd_category') );
		
					
		return array("category" => $oCategory, "contact" => $oContact);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		
		$manager = new ContactManager();
		$contacts = new ItemCollection();
		$contacts->push($oEntity['contact']);
		$manager->contactsProcess($oEntity['category'], $contacts,1);
		
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_subscription_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_subscription_error';
	}
	
		
}
