<?php

/**
 * 
 *
 * @author marcos
 * @since 28-12-2012
 *
 */
class ContactCategoryProcessAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){

		$cd_category = CdtUtils::getParam('cd_category');
		$cd_contact = str_ireplace('row_cd_contact_category_','',CdtUtils::getParam('contacts'));
		$contacts = explode( ",", $cd_contact);
		$oCategory = new Category();
		$oCategory->setCd_category($cd_category);
		
		return array("contacts" => $contacts, "Category" => $oCategory);
			

	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$manager = new ContactCategoryManager();
		$manager->processContactCategory($entity['Category'], $entity['contacts']);
		//$this->setDs_forward_params("id=" . $entity['SendingNewsletter']->getCd_sending_newsletter() );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'contactcategory_process_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'contactcategory_process_error';
	}


}
