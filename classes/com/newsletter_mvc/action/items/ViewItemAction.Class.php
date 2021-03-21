<?php 

/**
 * Acci�n para visualizar un item.
 *  
 * @author Marcos
 * @since 15/07/2015
 * 
 */
class ViewItemAction extends CdtOutputAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout(){
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputContent();
	 */
	protected function getOutputContent(){
			
		$xtpl = $this->getXTemplate ();
		
		$cd_item = CdtUtils::getParam('id');
			
		if (!empty( $cd_item )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_item', $cd_item, '=');
			
			$manager = new ItemManager();
			$oItem = $manager->getItem( $oCriteria );
			
		}else{
		
			$oItem = parent::getEntity();
		
		}
		
		//parseamos item.
		$this->parseEntity( $xtpl, $oItem );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_ITEM_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_ITEM_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oItem entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oItem){ 

				
		$xtpl->assign ( 'ds_image', '<img src="'.WEB_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/'.$oItem->getDs_image ().'" border="0"/>');
		$xtpl->assign ( 'ds_item', $oItem->getDs_item() );
				
		
		
		
	}
}
