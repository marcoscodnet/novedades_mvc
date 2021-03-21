<?php 

/** 
 * GridModel para ContactCategory
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactCategoryGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		//$this->buildModel( "cd_contact_category", BOL_LBL_CONTACTCATEGORY_CD_CONTACT_CATEGORY,  20 );
		
		
		
		$this->buildModel( "cd_contact", BOL_LBL_CONTACTCATEGORY_CD_CONTACT_CATEGORY,  20 );
		
		
		$this->buildModel( "ds_category", BOL_LBL_CONTACTCATEGORY_CD_CATEGORY,  30, "CC.cd_category", null, CDT_CMP_GRID_FILTER_TYPE_COMBOBOX, false, "", "=", new CdtCriteriaFormatValue());
		
		$this->setFilterModelOptions( "ds_category", BOLUtils::getCategoryItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		$this->buildModel( "ds_contact", BOL_LBL_CONTACTCATEGORY_CD_CONTACT,  30 );
		$this->buildModel( "ds_mail", BOL_LBL_CONTACT_DS_MAIL,  30 );
		$this->buildModel( "ds_company", BOL_LBL_CONTACT_DS_COMPANY,  30 );
		
		
		
				
		//acciones sobre la lista
		$this->buildAction( "add_contactcategory_init", "add_contactcategory_init", BOL_MSG_CONTACTCATEGORY_TITLE_ADD, "image", "add" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_CONTACTCATEGORY_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new ContactCategoryManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "contactcategory", "ContactCategory");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_CONTACTCATEGORY_DELETE);
	        $xtpl->assign('cd_contact_category', $item->getCd_contact_category() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_CONTACTCATEGORY_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
	
	public function getHeaderContent(){
		
		if (CdtUtils::getParam('init')) {
			return '<script type="text/javascript">
			$(document).ready(  function(){
				$("#ds_category_cd_contact_category").val(getSelected_1());
				search_ajax_cd_contact_category();
            	$("#checkAll_cd_contact_category").attr(\'checked\', true);
				checkTodos_cd_contact_category(\'checkAll_cd_contact_category\',\'search_results_cd_contact_category\');});
				
</script>
			';
		}
		

		
		
	}
}
?>
