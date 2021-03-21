<?php 

/**
 * Acci�n para visualizar un status.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewStatusAction extends CdtOutputAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout(){
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputContent();
	 */
	protected function getOutputContent(){
			
		$xtpl = $this->getXTemplate ();
		
		$cd_status = CdtUtils::getParam('id');
			
		if (!empty( $cd_status )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_status', $cd_status, '=');
			
			$manager = new StatusManager();
			$oStatus = $manager->getStatus( $oCriteria );
			
		}else{
		
			$oStatus = parent::getEntity();
		
		}
		
		//parseamos status.
		$this->parseEntity( $xtpl, $oStatus );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_STATUS_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_STATUS_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oStatus entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oStatus){ 

				
		$xtpl->assign ( 'cd_status', stripslashes ( $oStatus->getCd_status () ) );
		$xtpl->assign ( 'cd_status_label', BOL_LBL_STATUS_CD_STATUS );
				
		$xtpl->assign ( 'ds_status', stripslashes ( $oStatus->getDs_status () ) );
		$xtpl->assign ( 'ds_status_label', BOL_LBL_STATUS_DS_STATUS );
		
		
	}
}
