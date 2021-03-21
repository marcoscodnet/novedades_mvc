<?php 

/**
 * 
 *  
 * @author marcos
 * @since 29-10-2012
 * 
 */
class EditUnsubscribeInitAction extends CdtOutputAction{

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
		
		$complete = CdtUtils::getParam('complete');
		if ($complete) {
			$msg = BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE_SUCCESSFUL;
		}
		else {
	        $msg = BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE_MESSAGE;
			$xtpl->assign ( 'cd_contact', CdtUtils::getParam('cd_contact') );
			$xtpl->assign ( 'submit_button','<br></br><input type="submit" name="'.BOL_LBL_ACCEPT.'" value="'.BOL_LBL_ACCEPT.'"/>');
			$xtpl->assign('submit',  $this->getSubmitAction() );
		}
		
		$xtpl->assign ( 'message',$msg);
		
		
		//parseamos category.
		$this->parseStyles( $xtpl );
		
		
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		
		
		
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditContactInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "edit_unsubscribe";
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
		return new XTemplate ( BOL_TEMPLATE_UNSUBSCRIBE );
	}
	

	protected function parseStyles($xtpl) {
        $xtpl->assign('css', WEB_PATH . "css/slim.css");
        $xtpl->parse('main.css');
    }
}
