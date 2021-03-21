<?php 

/** 
 * Newsletter class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class Newsletter { 
	
	//variables de instancia.
	
	private $cd_newsletter;
	
	private $oCdt_user;
	
	private $oTemplate;
	
	private $dt_date;
	
	private $ds_newsletter;
	
	private $ds_text;
	
	private $ds_text2;
	
	private $ds_text3;
	
	private $ds_mail;
	
	private $oStatus;
	
	private $bl_twitter;
	
	private $bl_facebook;
	
	private $ds_linkheader;
	
	private $ds_linkfooter;
	
	private $bl_linkedin;
	
	private $img_header;
	
	private $img_footer;
	

	//Constructor.
	public function Newsletter() { 
		//inicializar variables.
		
		
		$this->cd_newsletter = '';
		
		$this->dt_date = '';
		
		$this->ds_newsletter = '';
		
		$this->ds_text = '';
		
		$this->ds_text2 = '';
		
		$this->ds_text3 = '';
		
		$this->ds_mail = '';
		
		$this->bl_twitter = '';
		
		$this->bl_facebook = '';
		
		
		$this->oCdt_user = new CdtUser();
		
		$this->oTemplate = new Template();
		
		$this->oStatus = new Status();
		
		$this->ds_linkheader = '';
		
		$this->ds_linkfooter = '';
		
		$this->bl_linkedin = '';
		
		$this->img_header = '';
		
		$this->img_footer = '';
		
	}

	//Getters	
		
	public function getCd_newsletter() { 
		return $this->cd_newsletter;
	}
		
	public function getCdt_user() { 
		return $this->oCdt_user;
	}
		
	public function getTemplate() { 
		return $this->oTemplate;
	}
		
	public function getDt_date() { 
		return $this->dt_date;
	}
		
	public function getDs_newsletter() { 
		return $this->ds_newsletter;
	}
		
	public function getDs_text() { 
		return $this->ds_text;
	}
		
	public function getDs_text2() { 
		return $this->ds_text2;
	}
		
	public function getDs_text3() { 
		return $this->ds_text3;
	}
		
	public function getDs_mail() { 
		return $this->ds_mail;
	}
		
	public function getStatus() { 
		return $this->oStatus;
	}
		
	public function getBl_twitter() { 
		return $this->bl_twitter;
	}
		
	public function getBl_facebook() { 
		return $this->bl_facebook;
	}
	
		
	public function getCd_user() { 
		return $this->oCdt_user->getCd_user();
	}
		
	public function getCd_template() { 
		return $this->oTemplate->getCd_template();
	}
	
	public function getDs_template() { 
		return $this->oTemplate->getDs_template();
	}
	
	public function getDs_path() { 
		return $this->oTemplate->getDs_path();
	}
		
	public function getCd_status() { 
		return $this->oStatus->getCd_status();
	}
	
	public function getDs_status() { 
		return $this->oStatus->getDs_status();
	}
	

	//Setters
	
	public function setCd_newsletter( $value ) { 
		$this->cd_newsletter = $value;
	}
	
	public function setCdt_user( $value ) { 
		$this->oCdt_user = $value;
	}
	
	public function setTemplate( $value ) { 
		$this->oTemplate = $value;
	}
	
	public function setDt_date( $value ) { 
		$this->dt_date = $value;
	}
	
	public function setDs_newsletter( $value ) { 
		$this->ds_newsletter = $value;
	}
	
	public function setDs_text( $value ) { 
		$this->ds_text = $value;
	}
	
	public function setDs_text2( $value ) { 
		$this->ds_text2 = $value;
	}
	
	public function setDs_text3( $value ) { 
		$this->ds_text3 = $value;
	}
	
	public function setDs_mail( $value ) { 
		$this->ds_mail = $value;
	}
	
	public function setStatus( $value ) { 
		$this->oStatus = $value;
	}
	
	public function setBl_twitter( $value ) { 
		$this->bl_twitter = $value;
	}
	
	public function setBl_facebook( $value ) { 
		$this->bl_facebook = $value;
	}
	
	
	public function setCd_user( $value ) { 
		$this->oCdt_user->setCd_user( $value );
	}
	
	public function setCd_template( $value ) { 
		$this->oTemplate->setCd_template( $value );
	}
	
	public function setCd_status( $value ) { 
		$this->oStatus->setCd_status( $value );
	}
	
	public function setDs_path( $value ) { 
		$this->oTemplate->setDs_path( $value );
	}

	public function getDs_linkheader()
	{
	    return $this->ds_linkheader;
	}

	public function setDs_linkheader($ds_linkheader)
	{
	    $this->ds_linkheader = $ds_linkheader;
	}

	public function getDs_linkfooter()
	{
	    return $this->ds_linkfooter;
	}

	public function setDs_linkfooter($ds_linkfooter)
	{
	    $this->ds_linkfooter = $ds_linkfooter;
	}

	public function getBl_linkedin()
	{
	    return $this->bl_linkedin;
	}

	public function setBl_linkedin($bl_linkedin)
	{
	    $this->bl_linkedin = $bl_linkedin;
	}

	public function getImg_header()
	{
	    return $this->img_header;
	}

	public function setImg_header($img_header)
	{
	    $this->img_header = $img_header;
	}

	public function getImg_footer()
	{
	    return $this->img_footer;
	}

	public function setImg_footer($img_footer)
	{
	    $this->img_footer = $img_footer;
	}
} 
?>
