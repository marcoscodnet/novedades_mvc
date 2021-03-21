<?php 

/**
 * Acción para inicializar el contexto para modificar
 * un contact.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 *  
 */
class UpdateContactInitAction extends EditContactInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oContact = null;

		//recuperamos dado su identifidor.
		$cd_contact = CdtUtils::getParam('id');
			
		if (!empty( $cd_contact )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact', $cd_contact, '=');
			
			$manager = new ContactManager();
			$oContact = $manager->getContact( $oCriteria );
			
		}else{
		
			$oContact = parent::getEntity();
		
		}
		return $oContact ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditContactInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_contact";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACT_TITLE_UPDATE;
	}

}
