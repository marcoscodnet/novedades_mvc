<?php 

/**
 * Acci�n para visualizar un contact.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewContactAction extends CdtOutputAction{

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
		
		$cd_contact = CdtUtils::getParam('id');
			
		if (!empty( $cd_contact )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_contact', $cd_contact, '=');
			
			$manager = new ContactManager();
			$oContact = $manager->getContact( $oCriteria );
			
		}else{
		
			$oContact = parent::getEntity();
		
		}
		
		//parseamos contact.
		$this->parseEntity( $xtpl, $oContact );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_CONTACT_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate(){ 
		return new XTemplate ( BOL_TEMPLATE_CONTACT_VIEW );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oContact entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oContact){ 

				
		$xtpl->assign ( 'cd_contact', stripslashes ( $oContact->getCd_contact () ) );
		$xtpl->assign ( 'cd_contact_label', BOL_LBL_CONTACT_CD_CONTACT );
				
		$xtpl->assign ( 'ds_name', stripslashes ( $oContact->getDs_name () ) );
		$xtpl->assign ( 'ds_name_label', BOL_LBL_CONTACT_DS_NAME );
				
		$xtpl->assign ( 'ds_mail', stripslashes ( $oContact->getDs_mail () ) );
		$xtpl->assign ( 'ds_mail_label', BOL_LBL_CONTACT_DS_MAIL );
				
		$xtpl->assign ( 'ds_phone', stripslashes ( $oContact->getDs_phone () ) );
		$xtpl->assign ( 'ds_phone_label', BOL_LBL_CONTACT_DS_PHONE );
				
		$xtpl->assign ( 'ds_movil', stripslashes ( $oContact->getDs_movil () ) );
		$xtpl->assign ( 'ds_movil_label', BOL_LBL_CONTACT_DS_MOVIL );
				
		$xtpl->assign ( 'ds_address', stripslashes ( $oContact->getDs_address () ) );
		$xtpl->assign ( 'ds_address_label', BOL_LBL_CONTACT_DS_ADDRESS );
				
		$xtpl->assign ( 'dt_birthday', BOLUtils::formatDateToView  ( $oContact->getDt_birthday () ) );
		$xtpl->assign ( 'dt_birthday_label', BOL_LBL_CONTACT_DT_BIRTHDAY );

		if ($oContact->getBl_signed () == '1') {
            $bl_signed = "Si";
        } else {
            $bl_signed = "No";
        }

        		
		$xtpl->assign ( 'bl_signed',  $bl_signed );
		$xtpl->assign ( 'bl_signed_label', BOL_LBL_CONTACT_BL_SIGNED );
				
		$xtpl->assign ( 'nu_hard', stripslashes ( $oContact->getNu_hard () ) );
		$xtpl->assign ( 'nu_hard_label', BOL_LBL_CONTACT_NU_HARD );
				
		$xtpl->assign ( 'nu_soft', stripslashes ( $oContact->getNu_soft () ) );
		$xtpl->assign ( 'nu_soft_label', BOL_LBL_CONTACT_NU_SOFT );
				
		$xtpl->assign ( 'ds_company', stripslashes ( $oContact->getDs_company () ) );
		$xtpl->assign ( 'ds_company_label', BOL_LBL_CONTACT_DS_COMPANY );
				
		if ($oContact->getBl_blocked () == '1') {
            $bl_blocked = "Si";
        } else {
            $bl_blocked = "No";
        }

        		
		$xtpl->assign ( 'bl_blocked',  $bl_blocked );
		$xtpl->assign ( 'bl_blocked_label', BOL_LBL_CONTACT_BL_BLOCKED );
		
		
	}
}
