<?php 

/** 
 * SendingNewsletter class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class SendingNewsletter { 
	
	//variables de instancia.
	
	private $cd_sending_newsletter;
	
	private $cd_newsletter;
	
	private $dt_date;
	
	private $ds_time;
	
	private $bl_sent;
	
	private $oStatus;
	
	private $oNewsletter;
	
	private $nu_soft;
	
	private $nu_hard;
	
	private $nu_open;
	
	private $nu_sent;
	

	//Constructor.
	public function SendingNewsletter() { 
		//inicializar variables.
		
		
		$this->cd_sending_newsletter = '';
		
		$this->cd_newsletter = '';
		
		$this->dt_date = '';
		
		$this->ds_time = '';
		
		$this->bl_sent = '';
		
		$this->oStatus = new Status();
		
		$this->oNewsletter = new Newsletter();
		
		$this->nu_hard = '';
		
		$this->nu_open = '';
		
		$this->nu_sent = '';
		
		$this->nu_soft = '';
		
		
	}

	//Getters	
		
	public function getCd_sending_newsletter() { 
		return $this->cd_sending_newsletter;
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
	
	public function getNewsletter()
	{
	    return $this->oNewsletter;
	}
	
	public function getCd_newsletter() { 
		return $this->oNewsletter->getCd_newsletter();
	}
	
	public function getDs_newsletter() { 
		return $this->oNewsletter->getDs_newsletter();
	}
	
	public function getNu_soft()
	{
	    return $this->nu_soft;
	}

	public function getNu_hard()
	{
	    return $this->nu_hard;
	}

	public function getNu_open()
	{
	    return $this->nu_open;
	}
	
	public function getNu_openrate()
	{
		if ($this->getNu_sent()>0) {
			return BOLUtils::Format_toDecimal((($this->getNu_open()/($this->getNu_sent()-($this->getNu_soft()+$this->getNu_hard())))*100)).'% ('.$this->getNu_open().'/'.($this->getNu_sent()-($this->getNu_soft()+$this->getNu_hard())).')';
			
		}
		else 
			return $this->nu_open;
	}


	public function getNu_sent()
	{
	    return $this->nu_sent;
	}
	
	public function getCd_status() { 
		return $this->oStatus->getCd_status();
	}
	
	public function getDs_status() { 
		return $this->oStatus->getDs_status();
	}


	//Setters
	
	public function setCd_sending_newsletter( $value ) { 
		$this->cd_sending_newsletter = $value;
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

	public function setNewsletter($oNewsletter)
	{
	    $this->oNewsletter = $oNewsletter;
	}
	
	public function setCd_newsletter( $value ) { 
		$this->oNewsletter->setCd_newsletter( $value );
	}

	public function setNu_soft($nu_soft)
	{
	    $this->nu_soft = $nu_soft;
	}

	public function setNu_hard($nu_hard)
	{
	    $this->nu_hard = $nu_hard;
	}

	public function setNu_open($nu_open)
	{
	    $this->nu_open = $nu_open;
	}

	public function setNu_sent($nu_sent)
	{
	    $this->nu_sent = $nu_sent;
	}
	
	public function setCd_status( $value ) { 
		$this->oStatus->setCd_status( $value );
	}
	

	public function getOStatus()
	{
	    return $this->oStatus;
	}

	public function setOStatus($oStatus)
	{
	    $this->oStatus = $oStatus;
	}

	public function getONewsletter()
	{
	    return $this->oNewsletter;
	}

	public function setONewsletter($oNewsletter)
	{
	    $this->oNewsletter = $oNewsletter;
	}
} 
?>
