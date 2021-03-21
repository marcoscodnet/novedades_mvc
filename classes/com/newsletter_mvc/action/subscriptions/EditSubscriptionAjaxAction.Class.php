<?php 

/**
 * 
 * 
 * @author marcos
 * @since 25-10-2012
 * 
 */
class EditSubscriptionAjaxAction extends CdtOutputAction {


	protected function getLayout() {
        $oLayout = new CdtLayoutBasicAjax();
        return $oLayout;
    }
    
	protected function getOutputContent() {
        $xtpl = $this->getXTemplate();
        
		$this->parseStyles($xtpl);
		$this->parseScripts($xtpl);
        
        $cd_category = CdtUtils::getParamPOST('cd_category');
        $ds_title = CdtUtils::getParamPOST('ds_title');
       	$xtpl->assign('web_path', WEB_PATH);
        $xtpl->assign('cd_category', $cd_category);
        $xtpl->assign('ds_title', $ds_title);
        
        $xtpl->assign ( 'ds_mail_label', BOL_LBL_CONTACT_DS_MAIL );
		$xtpl->assign ( 'ds_mail_required', '*' );
		$xtpl->assign ( 'ds_mail_required_msg', BOL_MSG_CONTACT_DS_MAIL_REQUIRED );
		$xtpl->assign ( 'ds_mail_mail_msg', BOL_MSG_INVALID_MAIL );
		
		$xtpl->assign ( 'lbl_subscription', BOL_LBL_SUBSCRIBE );
              
        
        $xtpl->parse('main');
        return $xtpl->text('main');
    }

   
protected function parseStyles($xtpl) {

       

        $xtpl->assign('css', WEB_PATH . "css/smile/jVal.css");
        $xtpl->parse('main.css');

        $xtpl->assign('css', WEB_PATH . "css/slim.css");
        $xtpl->parse('main.css');
    }

    protected function parseScripts($xtpl) {


        $xtpl->assign('js', WEB_PATH . "js/jquery/jquery-1.7.min.js");
        $xtpl->parse('main.script');
	
      

        $xtpl->assign('js', WEB_PATH . "js/jquery/jVal.js");
        $xtpl->parse('main.script');

       
    }
   

    protected function getEntity() {
        
    }

    public function getXTemplate() {
        return new XTemplate(BOL_TEMPLATE_SUBSCRIPTION_EDIT_AJAX);
    }

    protected function getOutputTitle() {
        return '';
    }

    /**
     * parseamos la entity en el template
     * @param XTemplate $xtpl template donde parsear la entity
     * @param object $oProduct entity a parsear
     */
    public function parseEntity(XTemplate $xtpl, $oProduct) {

    }
		
	
}
