<?php 

/** 
 * GridModel para Item
 *  
 * @author Marcos
 * @since 13/07/2015
 */ 
class ItemGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		$cd_newsletter = CdtUtils::getParam('id');
		
		$this->buildModel( "cd_item", BOL_LBL_ITEM_CD_ITEM,  80 );
						
		$this->buildModel( "ds_newsletter", BOL_LBL_ITEM_CD_NEWSLETTER,  60, "cd_newsletter" );
		$this->setFilterModelOptions( "ds_newsletter", BOLUtils::getNewsletterItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		$this->buildModel( "nu_order", BOL_LBL_ITEM_NU_ORDER,  80 );
		
				
		//acciones sobre la lista
		$this->buildAction( "add_item_init&cd_newsletter=".$cd_newsletter, "add_item_init&cd_newsletter=".$cd_newsletter, BOL_MSG_ITEM_TITLE_ADD, "image", "add" );
		$this->buildFilterHiddenModel( "cd_newsletter", "N.cd_newsletter", $cd_newsletter);	
	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_ITEM_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new ItemManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "item", "Item");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_ITEM_DELETE);
	        $xtpl->assign('cd_item', $item->getCd_item() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_ITEM_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
