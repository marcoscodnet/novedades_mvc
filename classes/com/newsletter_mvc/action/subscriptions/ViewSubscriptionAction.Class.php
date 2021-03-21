<?php 

/**
 * 
 *  
 * @author marcos
 * @since 26-10-2012
 * 
 */
class ViewSubscriptionAction extends CdtOutputAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout(){
		$oLayout = new CdtLayoutBasic();
		return $oLayout;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputContent();
	 */
	protected function getOutputContent(){
			
		$xtpl = $this->getXTemplate ();
		
		$info = CdtUtils::getRequestInfo();
        $msg = addslashes( urldecode($info['msg']) );
		
		$xtpl->assign ( 'message',$msg);
		
		CdtUtils::cleanRequestInfo();
		
		//parseamos category.
		$this->parseStyles( $xtpl );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return NOMBRE_APLICACION;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_SUBSCRIPTION_VIEW );
	}
	

	protected function parseStyles($xtpl) {

       

       

        $xtpl->assign('css', WEB_PATH . "css/slim.css");
        $xtpl->parse('main.css');
    }
}
