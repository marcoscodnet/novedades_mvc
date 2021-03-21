<?php 

/** 
 * GridModel para NewsletterImage
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterImageGridModel extends GridModel{

	
	public function __construct( ){

		parent::__construct();
		$this->initModel();
		
	}
	
	private function initModel(){
		
		
		$this->buildModel( "cd_newsletter_image", BOL_LBL_NEWSLETTERIMAGE_CD_NEWSLETTER_IMAGE,  80 );
		
		$this->buildModel( "ds_newsletter_image", BOL_LBL_NEWSLETTERIMAGE_DS_NEWSLETTER_IMAGE,  80 );
		
		$this->buildModel( "ds_path", BOL_LBL_NEWSLETTERIMAGE_DS_PATH,  80 );
		
		$this->buildModel( "cd_newsletter", BOL_LBL_NEWSLETTERIMAGE_CD_NEWSLETTER,  80 );
		
		$this->buildModel( "nu_order", BOL_LBL_NEWSLETTERIMAGE_NU_ORDER,  80 );
		
				
		//acciones sobre la lista
		$this->buildAction( "add_newsletterimage_init", "add_newsletterimage_init", BOL_MSG_NEWSLETTERIMAGE_TITLE_ADD, "image", "add" );

	}
	
		
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle(){
		return BOL_MSG_NEWSLETTERIMAGE_TITLE_LIST;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager(){
		return new NewsletterImageManager();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel( $item ){
		
		return $this->getDefaultRowActions( $item, "newsletterimage", "NewsletterImage");
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see GridModel::getMsgConfirmDelete( $item );
	 */
	protected function getMsgConfirmDelete( $item ){
		
		if(!empty($item)){
			$xtpl = new XTemplate(BOL_TEMPLATE_NEWSLETTERIMAGE_DELETE);
	        $xtpl->assign('cd_newsletter_image', $item->getCd_newsletter_image() );
	        $xtpl->assign('question', BOL_MSG_CONFIRM_DELETE_QUESTION );
	        $xtpl->assign('title_confirm', BOL_MSG_CONFIRM_DELETE_TITLE );
	        $xtpl->assign('lbl_code', BOL_LBL_NEWSLETTERIMAGE_CD_USER );
	        $xtpl->parse('main');
	        $text = addslashes($xtpl->text('main'));
			return CdtFormatUtils::quitarEnters($text);
		}else{
			return parent::getMsgConfirmDelete( $item );
		}
        
	}
}
?>
