<?php 

/** 
 * NewsletterImage class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterImage { 
	
	//variables de instancia.
	
	private $cd_newsletter_image;
	
	private $ds_newsletter_image;
	
	private $ds_path;
	
	private $oNewsletter;
	
	private $nu_order;
	

	//Constructor.
	public function NewsletterImage() { 
		//inicializar variables.
		
		
		$this->cd_newsletter_image = '';
		
		$this->ds_newsletter_image = '';
		
		$this->ds_path = '';
		
		$this->nu_order = '';
		
		
		$this->oNewsletter = new Newsletter();
		
	}

	//Getters	
		
	public function getCd_newsletter_image() { 
		return $this->cd_newsletter_image;
	}
		
	public function getDs_newsletter_image() { 
		return $this->ds_newsletter_image;
	}
		
	public function getDs_path() { 
		return $this->ds_path;
	}
		
	public function getNewsletter() { 
		return $this->oNewsletter;
	}
		
	public function getNu_order() { 
		return $this->nu_order;
	}
	
		
	public function getCd_newsletter() { 
		return $this->oNewsletter->getCd_newsletter();
	}
	

	//Setters
	
	public function setCd_newsletter_image( $value ) { 
		$this->cd_newsletter_image = $value;
	}
	
	public function setDs_newsletter_image( $value ) { 
		$this->ds_newsletter_image = $value;
	}
	
	public function setDs_path( $value ) { 
		$this->ds_path = $value;
	}
	
	public function setNewsletter( $value ) { 
		$this->oNewsletter = $value;
	}
	
	public function setNu_order( $value ) { 
		$this->nu_order = $value;
	}
	
	
	public function setCd_newsletter( $value ) { 
		$this->oNewsletter->setCd_newsletter( $value );
	}
	
} 
?>
