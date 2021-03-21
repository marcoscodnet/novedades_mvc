<?php 

/** 
 * GridModel para ImageCategory
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageCategoryGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		$this->buildModel( "cd_image_category", BOL_LBL_IMAGECATEGORY_CD_IMAGE_CATEGORY,  80 );
		
		$this->buildModel( "ds_image_category", BOL_LBL_IMAGECATEGORY_DS_IMAGE_CATEGORY,  80 );
		
				
		//acciones sobre la lista
		$this->buildAction( "add_imagecategory_init", "add_imagecategory_init", BOL_MSG_IMAGECATEGORY_TITLE_ADD, "image", "add" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_IMAGECATEGORY_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new ImageCategoryManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "imagecategory", "ImageCategory");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_IMAGECATEGORY_DELETE);
	        $xtpl->assign('cd_image_category', $item->getCd_image_category() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_IMAGECATEGORY_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
