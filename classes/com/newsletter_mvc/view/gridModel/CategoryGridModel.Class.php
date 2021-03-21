<?php 

/** 
 * GridModel para Category
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class CategoryGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		$this->buildModel( "cd_category", BOL_LBL_CATEGORY_CD_CATEGORY,  80 );
		
		$this->buildModel( "ds_category", BOL_LBL_CATEGORY_DS_CATEGORY,  80 );
		
				
		//acciones sobre la lista
		$this->buildAction( "add_category_init", "add_category_init", BOL_MSG_CATEGORY_TITLE_ADD, "image", "add" );
		$this->buildAction( "import_contact_init", "import_contact_init", BOL_MSG_CONTACTS_TITLE_IMPORT, "image", "import" );
	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_CATEGORY_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new CategoryManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		$actions = $this->getDefaultRowActions( $item, "category", BOL_MSG_CATEGORY_TITLE);
		$action = $this->buildRowAction("list_contactcategories&init=1&callback_cd_contact_category=selected_contacts", "list_contact_categories", BOL_MSG_CONTACTS_TITLE, CDT_UI_IMG_EDIT, "contacts", "cd_contact_category", false, "", true, 500, 750 ) ;
		$actions->addItem( $action );
		return $actions;
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_CATEGORY_DELETE);
	        $xtpl->assign('cd_category', $item->getCd_category() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_CATEGORY_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
