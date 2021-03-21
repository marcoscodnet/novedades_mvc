<?php 

/** 
 * Contact class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class Contact { 
	
	//variables de instancia.
	
	private $cd_contact;
	
	private $ds_name;
	
	private $ds_mail;
	
	private $ds_phone;
	
	private $ds_movil;
	
	private $ds_address;
	
	private $dt_birthday;
	
	private $bl_signed;
	
	private $nu_hard;
	
	private $nu_soft;
	
	private $ds_company;
	
	private $bl_blocked;
	
	private $categories;
	

	//Constructor.
	public function Contact() { 
		//inicializar variables.
		
		
		$this->cd_contact = '';
		
		$this->ds_name = '';
		
		$this->ds_mail = '';
		
		$this->ds_phone = '';
		
		$this->ds_movil = '';
		
		$this->ds_address = '';
		
		$this->dt_birthday = '';
		
		$this->bl_signed = '';
		
		$this->nu_hard = '';
		
		$this->nu_soft = '';
		
		$this->ds_company = '';
		
		$this->bl_blocked = '';
		
		$this->categories = new ItemCollection();
		
	}

	//Getters	
		
	public function getCd_contact() { 
		return $this->cd_contact;
	}
		
	public function getDs_name() { 
		return $this->ds_name;
	}
		
	public function getDs_mail() { 
		return $this->ds_mail;
	}
		
	public function getDs_phone() { 
		return $this->ds_phone;
	}
		
	public function getDs_movil() { 
		return $this->ds_movil;
	}
		
	public function getDs_address() { 
		return $this->ds_address;
	}
		
	public function getDt_birthday() { 
		return $this->dt_birthday;
	}
		
	public function getBl_signed() { 
		return $this->bl_signed;
	}
		
	public function getNu_hard() { 
		return $this->nu_hard;
	}
		
	public function getNu_soft() { 
		return $this->nu_soft;
	}
		
	public function getDs_company() { 
		return $this->ds_company;
	}
		
	public function getBl_blocked() { 
		return $this->bl_blocked;
	}
	
	

	//Setters
	
	public function setCd_contact( $value ) { 
		$this->cd_contact = $value;
	}
	
	public function setDs_name( $value ) { 
		$this->ds_name = $value;
	}
	
	public function setDs_mail( $value ) { 
		$this->ds_mail = $value;
	}
	
	public function setDs_phone( $value ) { 
		$this->ds_phone = $value;
	}
	
	public function setDs_movil( $value ) { 
		$this->ds_movil = $value;
	}
	
	public function setDs_address( $value ) { 
		$this->ds_address = $value;
	}
	
	public function setDt_birthday( $value ) { 
		$this->dt_birthday = $value;
	}
	
	public function setBl_signed( $value ) { 
		$this->bl_signed = $value;
	}
	
	public function setNu_hard( $value ) { 
		$this->nu_hard = $value;
	}
	
	public function setNu_soft( $value ) { 
		$this->nu_soft = $value;
	}
	
	public function setDs_company( $value ) { 
		$this->ds_company = $value;
	}
	
	public function setBl_blocked( $value ) { 
		$this->bl_blocked = $value;
	}
	
	

	public function getCategories()
	{
	    return $this->categories;
	}

	public function setCategories($categories)
	{
	    $this->categories = $categories;
	}
} 
?>
