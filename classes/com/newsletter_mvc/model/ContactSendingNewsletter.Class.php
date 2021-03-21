<?php 

/** 
 * ContactSendingNewsletter class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactSendingNewsletter { 
	
	//variables de instancia.
	
	private $cd_contact_sending_newsletter;
	
	private $oSendingNewsletter;
	
	private $oContact;
	
	private $oCategory;
	
	private $dt_date;
	
	private $ds_time;
	
	private $bl_sent;
	
	private $dt_sent;
	
	private $nu_hard;
	
	private $nu_soft;
	
	private $bl_processed;
	
	private $bl_open;
	
	private $ds_log;
	

	//Constructor.
	public function ContactSendingNewsletter() { 
		//inicializar variables.
		
		
		$this->cd_contact_sending_newsletter = '';
		
		$this->dt_date = '';
		
		$this->ds_time = '';
		
		$this->bl_sent = '';
		
		$this->dt_sent = '';
		
		$this->nu_hard = '';
		
		$this->nu_soft = '';
		
		$this->bl_processed = '';
		
		$this->bl_open = '';
		
		$this->ds_log = '';
		
		
		$this->oSendingNewsletter = new SendingNewsletter();
		
		$this->oContact = new Contact();
		
		$this->oCategory = new Category();
		
	}

	//Getters	
		
	public function getCd_contact_sending_newsletter() { 
		return $this->cd_contact_sending_newsletter;
	}
		
	public function getSendingNewsletter() { 
		return $this->oSendingNewsletter;
	}
		
	public function getContact() { 
		return $this->oContact;
	}
		
	public function getCategory() { 
		return $this->oCategory;
	}
		
	public function getDt_date() { 
		return $this->dt_date;
	}
		
	public function getDs_time() { 
		return $this->ds_time;
	}
		
	public function getBl_sent() { 
		return $this->bl_sent;
	}
		
	public function getDt_sent() { 
		return $this->dt_sent;
	}
		
	public function getNu_hard() { 
		return $this->nu_hard;
	}
		
	public function getNu_soft() { 
		return $this->nu_soft;
	}
		
	public function getBl_processed() { 
		return $this->bl_processed;
	}
		
	public function getBl_open() { 
		return $this->bl_open;
	}
	
		
	public function getCd_sending_newsletter() { 
		return $this->oSendingNewsletter->getCd_sending_newsletter();
	}
	
	public function getDs_newsletter() { 
		return $this->oSendingNewsletter->getDs_newsletter();
	}
		
	public function getCd_contact() { 
		return $this->oContact->getCd_contact();
	}
	
	public function getDs_contact() { 
		return $this->oContact->getDs_name();
	}
	
	public function getDs_mail() { 
		return $this->oContact->getDs_mail();
	}
		
	public function getCd_category() { 
		return $this->oCategory->getCd_category();
	}
	
	public function getDs_category() { 
		return $this->oCategory->getDs_category();
	}
	

	//Setters
	
	public function setCd_contact_sending_newsletter( $value ) { 
		$this->cd_contact_sending_newsletter = $value;
	}
	
	public function setSendingNewsletter( $value ) { 
		$this->oSendingNewsletter = $value;
	}
	
	public function setContact( $value ) { 
		$this->oContact = $value;
	}
	
	public function setCategory( $value ) { 
		$this->oCategory = $value;
	}
	
	public function setDt_date( $value ) { 
		$this->dt_date = $value;
	}
	
	public function setDs_time( $value ) { 
		$this->ds_time = $value;
	}
	
	public function setBl_sent( $value ) { 
		$this->bl_sent = $value;
	}
	
	public function setDt_sent( $value ) { 
		$this->dt_sent = $value;
	}
	
	public function setNu_hard( $value ) { 
		$this->nu_hard = $value;
	}
	
	public function setNu_soft( $value ) { 
		$this->nu_soft = $value;
	}
	
	public function setBl_processed( $value ) { 
		$this->bl_processed = $value;
	}
	
	public function setBl_open( $value ) { 
		$this->bl_open = $value;
	}
	
	
	public function setCd_sending_newsletter( $value ) { 
		$this->oSendingNewsletter->setCd_sending_newsletter( $value );
	}
	
	public function setCd_contact( $value ) { 
		$this->oContact->setCd_contact( $value );
	}
	
	public function setCd_category( $value ) { 
		$this->oCategory->setCd_category( $value );
	}
	

	public function getDs_log()
	{
	    return $this->ds_log;
	}

	public function setDs_log($ds_log)
	{
	    $this->ds_log = $ds_log;
	}
} 
?>
