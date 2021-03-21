<?php 

/** 
 * GridModel para SendingNewsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class SendingNewsletterGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		$cd_newsletter = CdtUtils::getParam('id');
		$this->buildModel( "cd_sending_newsletter", BOL_LBL_SENDINGNEWSLETTER_CD_SENDING_NEWSLETTER,  20 );
		
		//$this->buildModel( "cd_newsletter", BOL_LBL_SENDINGNEWSLETTER_CD_NEWSLETTER,  60 );

		$this->buildModel( "ds_newsletter", BOL_LBL_SENDINGNEWSLETTER_CD_NEWSLETTER,  60, "cd_newsletter" );
		$this->setFilterModelOptions( "ds_newsletter", BOLUtils::getNewsletterItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		//$this->buildModel( "dt_date", BOL_LBL_SENDINGNEWSLETTER_DT_DATE,  20 );
		$this->buildModel("dt_date", BOL_LBL_SENDINGNEWSLETTER_DT_DATE, 20, "dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT) );
		$this->buildFilterModel("dt_date_from", BOL_LBL_NEWSLETTER_DT_DATE_FROM, 20, "dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", ">=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
        $this->buildFilterModel("dt_date_to", BOL_LBL_NEWSLETTER_DT_DATE_TO, 20, "dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "<=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
		
		
		$this->buildModel( "ds_time", BOL_LBL_SENDINGNEWSLETTER_DS_TIME,  20 );
		
		
		/*$this->buildModel( "bl_sent", BOL_LBL_SENDINGNEWSLETTER_BL_SENT,  20,"SN.bl_sent",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_sent", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);*/
		
		$this->buildModel( "ds_status", BOL_LBL_NEWSLETTER_CD_STATUS,  40, "SN.cd_status" );
		$this->setFilterModelOptions( "ds_status", BOLUtils::getStatusItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
				
		$this->buildGridColumnModel( "nu_soft", BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_SOFT,  30 );	
		$this->buildGridColumnModel( "nu_hard", BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_HARD,  30 );
		$this->buildGridColumnModel( "nu_openrate", BOL_LBL_SENDINGNEWSLETTER_NU_OPENRATE,  30 );
				
		//acciones sobre la lista
		//$this->buildAction( "add_sendingnewsletter_init", "add_sendingnewsletter_init", BOL_MSG_SENDINGNEWSLETTER_TITLE_ADD, "image", "add" );

		$this->buildFilterHiddenModel( "cd_newsletter", "N.cd_newsletter", $cd_newsletter);	
	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_SENDINGNEWSLETTER_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new SendingNewsletterManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		$actions = $this->getDefaultRowActions( $item, "sendingnewsletter", "SendingNewsletter", false, false, false);
		$action = $this->buildRowAction("list_contactsendingnewsletters", "list_contactsendingnewsletters", BOL_MSG_CONTACTS_TITLE, CDT_UI_IMG_EDIT, "contacts" ) ;
		$actions->addItem( $action );
		return $actions;
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_SENDINGNEWSLETTER_DELETE);
	        $xtpl->assign('cd_sending_newsletter', $item->getCd_sending_newsletter() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_SENDINGNEWSLETTER_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
