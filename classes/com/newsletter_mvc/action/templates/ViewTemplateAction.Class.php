<?php 

/**
 * Acci�n para visualizar un template.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewTemplateAction extends CdtOutputAction{

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
		
		$cd_template = CdtUtils::getParam('id');
			
		if (!empty( $cd_template )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_template', $cd_template, '=');
			
			$manager = new TemplateManager();
			$oTemplate = $manager->getTemplate( $oCriteria );
			
		}else{
		
			$oTemplate = parent::getEntity();
		
		}
		
		//parseamos template.
		$this->parseEntity( $xtpl, $oTemplate );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_TEMPLATE_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_TEMPLATE_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oTemplate entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oTemplate){ 

				
		$xtpl->assign ( 'cd_template', stripslashes ( $oTemplate->getCd_template () ) );
		$xtpl->assign ( 'cd_template_label', BOL_LBL_TEMPLATE_CD_TEMPLATE );
				
		$xtpl->assign ( 'ds_template', stripslashes ( $oTemplate->getDs_template () ) );
		$xtpl->assign ( 'ds_template_label', BOL_LBL_TEMPLATE_DS_TEMPLATE );
				
		$xtpl->assign ( 'ds_path', stripslashes ( $oTemplate->getDs_path () ) );
		$xtpl->assign ( 'ds_path_label', BOL_LBL_TEMPLATE_DS_PATH );
				
		$xtpl->assign ( 'nu_image', stripslashes ( $oTemplate->getNu_image () ) );
		$xtpl->assign ( 'nu_image_label', BOL_LBL_TEMPLATE_NU_IMAGE );
		
		
	}
}
