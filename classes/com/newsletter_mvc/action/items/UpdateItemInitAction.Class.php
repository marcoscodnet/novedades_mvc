<?php 

/**
 * Acci�n para inicializar el contexto para modificar
 * un item.
 *  
 * @author Marcos
 * @since 15-07-2015
 *  
 */
class UpdateItemInitAction extends EditItemInitAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oItem = null;

		//recuperamos dado su identifidor.
		$cd_item = CdtUtils::getParam('id');
			
		if (!empty( $cd_item )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_item', $cd_item, '=');
			
			$manager = new ItemManager();
			$oItem = $manager->getItem( $oCriteria );
			
		}else{
		
			$oItem = parent::getEntity();
		
		}
		return $oItem ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditItemInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "update_item";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_ITEM_TITLE_UPDATE;
	}

}
