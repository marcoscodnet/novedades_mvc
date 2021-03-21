<?php 

/** 
 * ContactCategory class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactCategory { 
	
	//variables de instancia.
	
	private $cd_contact_category;
	
	private $oContact;
	
	private $oCategory;
	

	//Constructor.
	public function ContactCategory() { 
		//inicializar variables.
		
		
		$this->cd_contact_category = '';
		
		
		$this->oContact = new Contact();
		
		$this->oCategory = new Category();
		
	}

	//Getters	
		
	public function getCd_contact_category() { 
		return $this->cd_contact_category;
	}
		
	public function getContact() { 
		return $this->oContact;
	}
		
	public function getCategory() { 
		return $this->oCategory;
	}
	
		
	public function getCd_contact() { 
		return $this->oContact->getCd_contact();
	}
		
	public function getCd_category() { 
		return $this->oCategory->getCd_category();
	}
	
	public function getDs_category() { 
		return $this->oCategory->getDs_category();
	}
	
	public function getDs_contact() { 
		return $this->oContact->getDs_name();
	}
	
	public function getDs_mail() { 
		return $this->oContact->getDs_mail();
	}
	
	public function getDs_company() { 
		return $this->oContact->getDs_company();
	}
	

	//Setters
	
	public function setCd_contact_category( $value ) { 
		$this->cd_contact_category = $value;
	}
	
	public function setContact( $value ) { 
		$this->oContact = $value;
	}
	
	public function setCategory( $value ) { 
		$this->oCategory = $value;
	}
	
	
	public function setCd_contact( $value ) { 
		$this->oContact->setCd_contact( $value );
	}
	
	public function setCd_category( $value ) { 
		$this->oCategory->setCd_category( $value );
	}
	
} 
?>
