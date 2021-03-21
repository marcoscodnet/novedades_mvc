<?php 

/**
 * Acción para inicializar el contexto para dar de alta
 * un newsletter.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class AddNewsletterInitAction extends EditNewsletterInitAction{

	
/**
	 * (non-PHPdoc)
	 * @see CdtEditInitAction::parseEntity();
	 */
	protected function parseEntity($entity, XTemplate $xtpl){
		parent::parseEntity($entity, $xtpl);
		//parseamos la entity
		//print_r($_GET);
		if(!CdtUtils::getParam('temp')){
			$xtpl->assign ( 'ds_mail', BOL_NEWSLETTER_DS_MAIL );
			$xtpl->assign ( 'dt_date', DATE(BOL_DATE_FORMAT) );
			$xtpl->assign('checked_bl_twitter', 'checked');
	        $xtpl->assign('checked_bl_facebook', 'checked');
	        $xtpl->assign('checked_bl_linkedin', 'checked');
		}
        $xtpl->assign ( 'cd_template', BOL_NEWSLETTER_CD_TEMPLATE );
        $xtpl->assign ( 'cd_status', BOL_NEWSLETTER_CD_STATUS_DEFAULT );
       }
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_NEWSLETTER_TITLE_ADD;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditNewsletterInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "add_newsletter";
	}

	
}
