<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un item.
 * 
 * @author Marcos
 * @since 13/07/2015
 * 
 */
class AddItemInitAction extends EditItemInitAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oItem = null;

		//recuperamos dado su identifidor.
		$cd_newsletter = CdtUtils::getParam('cd_newsletter');
			
		if (!empty( $cd_newsletter )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_newsletter', $cd_newsletter, '=');
			
			$manager = new NewsletterManager();
			$oNewsletter = $manager->getNewsletter( $oCriteria );
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('I.cd_newsletter', $cd_newsletter, '=');
			$oCriteria->addOrder('nu_order', "DESC");
			
			$manager = new ItemManager();
			$oItems = $manager->getItems($oCriteria);
			
			//print_r($oItems->size());
			$nu_order =($oItems->size())?$oItems->getObjectByIndex(0)->getNu_order()+1:1;
			
			$oItem = new Item();
			$oItem->setNewsletter($oNewsletter);
			$oItem->setNu_order($nu_order);
			
		}
		return $oItem ;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_ITEM_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditItemInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_item";
	}

	
}
