<?php 

/** 
 * GridModel para ContactSendingNewsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactSendingNewsletterGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		$cd_sending_newsletter = CdtUtils::getParam('id');
		$this->buildModel( "cd_contact_sending_newsletter", BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CONTACT_SENDING_NEWSLETTER,  20 );
		
		//$this->buildModel( "cd_sending_newsletter", BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_SENDING_NEWSLETTER,  80 );
		
		$this->buildModel( "ds_newsletter", BOL_LBL_SENDINGNEWSLETTER_CD_NEWSLETTER,  40 );
		
		$this->buildModel( "ds_contact", BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CONTACT,  40 );
		
		$this->buildModel( "ds_mail", BOL_LBL_CONTACT_DS_MAIL,  40, "CO.ds_mail" );
		
		$this->buildModel( "ds_category", BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_CATEGORY,  20, "CSN.cd_category" );
		$this->setFilterModelOptions( "ds_category", BOLUtils::getCategoryItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		$this->buildModel("dt_date", BOL_LBL_CONTACTSENDINGNEWSLETTER_DT_DATE, 20, "CSN.dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT) );
		$this->buildFilterModel("dt_date_from", BOL_LBL_NEWSLETTER_DT_DATE_FROM, 20, "CSN.dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", ">=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
        $this->buildFilterModel("dt_date_to", BOL_LBL_NEWSLETTER_DT_DATE_TO, 20, "CSN.dt_date", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "<=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
		
		
		$this->buildModel( "ds_time", BOL_LBL_CONTACTSENDINGNEWSLETTER_DS_TIME,  10 );
		
		
		$this->buildModel( "bl_sent", BOL_LBL_SENDINGNEWSLETTER_BL_SENT,  20,"CSN.bl_sent",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_sent", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		//$this->buildModel( "dt_sent", BOL_LBL_CONTACTSENDINGNEWSLETTER_DT_SENT,  80 );
		
		$this->buildModel( "nu_hard", BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_HARD,  30,"CSN.nu_hard",new GridBoolValueFormat() );
		
		$this->buildModel( "nu_soft", BOL_LBL_CONTACTSENDINGNEWSLETTER_NU_SOFT,  30,"CSN.nu_soft",new GridBoolValueFormat() );
		
		//$this->buildModel( "bl_processed", BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_PROCESSED,  80 );
		
		
		$this->buildModel( "bl_open", BOL_LBL_CONTACTSENDINGNEWSLETTER_BL_OPEN,  15,"CSN.bl_open",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_open", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
				
		//acciones sobre la lista
		//$this->buildAction( "add_contactsendingnewsletter_init", "add_contactsendingnewsletter_init", BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_ADD, "image", "add" );
		
		$this->buildFilterHiddenModel( "cd_sending_newsletter", "SN.cd_sending_newsletter", $cd_sending_newsletter);	

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new ContactSendingNewsletterManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "contactsendingnewsletter", "ContactSendingNewsletter");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_CONTACTSENDINGNEWSLETTER_DELETE);
	        $xtpl->assign('cd_contact_sending_newsletter', $item->getCd_contact_sending_newsletter() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_CONTACTSENDINGNEWSLETTER_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
