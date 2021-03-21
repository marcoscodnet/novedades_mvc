<?php 

/** 
 * GridModel para Newsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		$this->buildModel( "cd_newsletter", BOL_LBL_NEWSLETTER_CD_NEWSLETTER,  20 );
		
		$this->buildModel("dt_date", BOL_LBL_NEWSLETTER_DT_DATE, 20, "dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT) );
		$this->buildFilterModel("dt_date_from", BOL_LBL_NEWSLETTER_DT_DATE_FROM, 20, "dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", ">=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
        $this->buildFilterModel("dt_date_to", BOL_LBL_NEWSLETTER_DT_DATE_TO, 20, "dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "<=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
		
		$this->buildModel( "ds_newsletter", BOL_LBL_NEWSLETTER_DS_NEWSLETTER,  60 );
		
		$this->buildModel( "ds_mail", BOL_LBL_NEWSLETTER_DS_MAIL,  60 );
		
	
		$this->buildModel( "ds_status", BOL_LBL_NEWSLETTER_CD_STATUS,  40, "S.cd_status" );
		$this->setFilterModelOptions( "ds_status", BOLUtils::getStatusItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		
		$this->buildModel( "bl_twitter", BOL_LBL_NEWSLETTER_BL_TWITTER,  15,"bl_twitter",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_twitter", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		$this->buildModel( "bl_facebook", BOL_LBL_NEWSLETTER_BL_FACEBOOK,  15,"bl_facebook",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_facebook", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
				
		//acciones sobre la lista
		$this->buildAction( "add_newsletter_init", "add_newsletter_init", BOL_MSG_NEWSLETTER_TITLE_ADD, "image", "add" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_NEWSLETTER_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new NewsletterManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		$actions = $this->getDefaultRowActions( $item, "newsletter", "Newsletter", false);
		
		$action = $this->buildRowAction("list_items", "list_items", BOL_MSG_ITEM_TITLE_LIST, CDT_UI_IMG_EDIT, "save_newsletter") ;
		$actions->addItem( $action );
		/*$action = $this->buildRowAction("add_newsletter_init", "add_newsletter_init", BOL_MSG_SENDINGNEWSLETTER_SAVE, CDT_UI_IMG_EDIT, "save_newsletter") ;
		$actions->addItem( $action );*/
		$action = $this->buildRowAction("view_newsletter", "view_newsletter", CDT_CMP_GRID_MSG_VIEW, CDT_UI_IMG_SEARCH, "view_newsletter") ;
		$action->setBl_targetblank(true);
		$actions->addItem( $action );
		$action = $this->buildRowAction("list_categories_to_send&callback_cd_category=selected_categories", "list_categories_to_send", BOL_MSG_NEWSLETTER_TITLE_SENT, CDT_UI_IMG_EDIT, "send", "cd_category", false, "", true, 500, 750 ) ;
		$actions->addItem( $action );
		$action = $this->buildRowAction("list_sendingnewsletters", "list_sendingnewsletters", BOL_MSG_SENDINGNEWSLETTER_TITLE, CDT_UI_IMG_EDIT, "sent" ) ;
		$actions->addItem( $action );
		/*$action = $this->buildRowAction("add_newsletterimage_init", "add_newsletterimage_init", BOL_MSG_NEWSLETTERIMAGES_TITLE, CDT_UI_IMG_EDIT, "imgs" ) ;
		$actions->addItem( $action );*/
		return $actions;
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_NEWSLETTER_DELETE);
	        $xtpl->assign('cd_newsletter', $item->getCd_newsletter() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_NEWSLETTER_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
	
	public function getHeaderContent(){
		if (isset($_SESSION['remove_anyway'])) {
			unset($_SESSION['remove_anyway']);
			$cd_newsletter = $_SESSION['cd_newsletter'];
			unset($_SESSION['cd_newsletter']);
			return '<script type="text/javascript">
				confirm_action( \''.BOL_MSG_CONFIRM_DELETE_QUESTION_ANYWAY.'\' , \''.CDT_CMP_GRID_MSG_CONFIRM_DELETE_TITLE.'\',  function(){ jQuery(\'#searchdiv_1\').load( \'doAction?action=delete_newsletter&anyway=1&id='.$cd_newsletter.'\') } ); 
				
</script>
			';
		}
		
		
	}
	
	
}
?>
