<?php 

/**
 * Acción para modificar contact.
 * 
 * @author marcos
 * @since 29-10-2012
 *  
 */
class EditUnsubscribeAction extends CdtEditAction{


/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		$oContact = null;

		//recuperamos dado su identifidor.
		$cd_contact = CdtUtils::getParamPOST('cd_contact');
			
		if (!empty( $cd_contact )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact', $cd_contact, '=');
			
			$manager = new ContactManager();
			$oContact = $manager->getContact( $oCriteria );
			
		}/*else{
		
			$oContact = parent::getEntity();
		
		}*/
		$oContact->setBl_signed(0);
		return $oContact ;
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = new ContactManager();
		
		
		$manager->updateContact( $oEntity, $oEntity->getCategories() );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		$this->setDs_forward_params("complete=1");
		return 'update_unsubscribe_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_unsubscribe_error';
	}

	
}
