<?php 

/** 
 * GridModel para Image
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		$this->buildModel( "cd_image", BOL_LBL_IMAGE_CD_IMAGE,  80 );
		
		$this->buildModel( "cd_image_category", BOL_LBL_IMAGE_CD_IMAGE_CATEGORY,  80 );
		
		$this->buildModel( "cd_template", BOL_LBL_IMAGE_CD_TEMPLATE,  80 );
		
		$this->buildModel( "ds_image", BOL_LBL_IMAGE_DS_IMAGE,  80 );
		
		$this->buildModel( "nu_size", BOL_LBL_IMAGE_NU_SIZE,  80 );
		
		$this->buildModel( "ds_type", BOL_LBL_IMAGE_DS_TYPE,  80 );
		
		$this->buildModel( "dt_date", BOL_LBL_IMAGE_DT_DATE,  80 );
		
				
		//acciones sobre la lista
		$this->buildAction( "add_image_init", "add_image_init", BOL_MSG_IMAGE_TITLE_ADD, "image", "add" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_IMAGE_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new ImageManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "image", "Image");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_IMAGE_DELETE);
	        $xtpl->assign('cd_image', $item->getCd_image() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_IMAGE_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
