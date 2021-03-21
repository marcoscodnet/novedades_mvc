<?php 

/** 
 * GridModel para Contact
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		$this->buildModel( "cd_contact", BOL_LBL_CONTACT_CD_CONTACT,  20 );
		
		$this->buildModel( "ds_name", BOL_LBL_CONTACT_DS_NAME,  30 );
		
		$this->buildModel( "ds_mail", BOL_LBL_CONTACT_DS_MAIL,  30 );
		
		$this->buildModel( "ds_phone", BOL_LBL_CONTACT_DS_PHONE,  20 );
		
		$this->buildModel( "ds_movil", BOL_LBL_CONTACT_DS_MOVIL,  20 );
		
		$this->buildModel( "ds_address", BOL_LBL_CONTACT_DS_ADDRESS,  20 );
		
		$this->buildModel("dt_birthday", BOL_LBL_CONTACT_DT_BIRTHDAY, 20, "dt_birthday", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT) );
		$this->buildFilterModel("dt_birthday_from", BOL_LBL_CONTACT_DT_BIRTHDAY_FROM, 20, "dt_birthday", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", ">=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
        $this->buildFilterModel("dt_birthday_to", BOL_LBL_CONTACT_DT_BIRTHDAY_TO, 20, "dt_birthday", new GridDateValueFormat(BOL_DATE_FORMAT), CDT_CMP_GRID_FILTER_TYPE_DATE, false, "", "<=", new CdtCriteriaFormatMysqlDateValue(BOL_DATE_FORMAT));
		
		$this->buildModel( "ds_company", BOL_LBL_CONTACT_DS_COMPANY,  30 );
		
		$this->buildModel( "nu_hard", BOL_LBL_CONTACT_NU_HARD,  25 );
		
		$this->buildModel( "nu_soft", BOL_LBL_CONTACT_NU_SOFT,  25 );
		
		$this->buildModel( "bl_signed", BOL_LBL_CONTACT_BL_SIGNED,  15,"bl_signed",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_signed", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		$this->buildModel( "bl_blocked", BOL_LBL_CONTACT_BL_BLOCKED,  15,"bl_blocked",new GridBoolValueFormat() );
		$this->setFilterModelOptions("bl_blocked", BOLUtils::getYesNoItems(), CDT_CMP_GRID_FILTER_TYPE_COMBOBOX);
		
		
				
		//acciones sobre la lista
		$this->buildAction( "add_contact_init", "add_contact_init", BOL_MSG_CONTACT_TITLE_ADD, "image", "add" );
		$this->buildAction( "import_contact_init", "import_contact_init", BOL_MSG_CONTACTS_TITLE_IMPORT, "image", "import" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_CONTACT_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new ContactManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "contact", BOL_MSG_CONTACT_TITLE);
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_CONTACT_DELETE);
	        $xtpl->assign('cd_contact', $item->getCd_contact() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_CONTACT_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
