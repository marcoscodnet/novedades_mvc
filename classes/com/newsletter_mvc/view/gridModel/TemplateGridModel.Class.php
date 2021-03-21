<?php 

/** 
 * GridModel para Template
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class TemplateGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		$this->buildModel( "cd_template", BOL_LBL_TEMPLATE_CD_TEMPLATE,  80 );
		
		$this->buildModel( "ds_template", BOL_LBL_TEMPLATE_DS_TEMPLATE,  80 );
		
		$this->buildModel( "ds_path", BOL_LBL_TEMPLATE_DS_PATH,  80 );
		
		$this->buildModel( "nu_image", BOL_LBL_TEMPLATE_NU_IMAGE,  80 );
		
				
		//acciones sobre la lista
		$this->buildAction( "add_template_init", "add_template_init", BOL_MSG_TEMPLATE_TITLE_ADD, "image", "add" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_TEMPLATE_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new TemplateManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "template", "Template");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_TEMPLATE_DELETE);
	        $xtpl->assign('cd_template', $item->getCd_template() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_TEMPLATE_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
