<?php

/**
 * 
 *
 * @author marcos
 * @since 04-11-2012
 *
 */
class OpeningCountAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){

		$oContactSendingNewsletter = null;

		//recuperamos dado su identifidor.
		$cd_contact_sending_newsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_contact_sending_newsletter )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('CSN.cd_contact_sending_newsletter', $cd_contact_sending_newsletter, '=');
			
			$manager = new ContactSendingNewsletterManager();
			$oContactSendingNewsletter = $manager->getContactSendingNewsletter( $oCriteria );
			
		}else{
		
			$oContactSendingNewsletter = new ContactSendingNewsletter();
		
		}
		return $oContactSendingNewsletter ;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$manager = new ContactSendingNewsletterManager();
		$entity->setBl_open(1);
		$manager->updateContactSendingNewsletter($entity);
		
	}
	

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'opening_count_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'opening_count_error';
	}


}
