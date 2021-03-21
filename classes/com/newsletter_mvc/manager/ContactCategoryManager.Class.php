<?php 

/** 
 * Manager para ContactCategory
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactCategoryManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param ContactCategory $oContactCategory entity a agregar.
	 */
	public function addContactCategory(ContactCategory $oContactCategory) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ContactCategoryDAO::addContactCategory($oContactCategory);
	}


	/**
	 * se modifica la entity
	 * @param ContactCategory $oContactCategory entity a modificar.
	 */
	public function updateContactCategory(ContactCategory $oContactCategory) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ContactCategoryDAO::updateContactCategory($oContactCategory);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteContactCategory($id) { 
		//TODO validaciones; 

		$oContactCategory = new ContactCategory();
		$oContactCategory->setCd_contact_category($id);
		ContactCategoryDAO::deleteContactCategory($oContactCategory);
	}

	
	/**
	 * se obtiene una colecciï¿½n de entities dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return ItemCollection[ContactCategory]
	 */
	public function getContactCategories(CdtSearchCriteria $oCriteria) { 
		return ContactCategoryDAO::getContactCategories($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return int
	 */
	public function getContactCategoriesCount(CdtSearchCriteria $oCriteria) { 
		return ContactCategoryDAO::getContactCategoriesCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return ContactCategory
	 */
	public function getContactCategory(CdtSearchCriteria $oCriteria) { 
		return ContactCategoryDAO::getContactCategory($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getContactCategories($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getContactCategoriesCount($oCriteria); 
	}
	
	public function processContactCategory(Category $oCategory, $contacts) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		
		
		//eliminamos las categorias que tenía asignados.
		ContactCategoryDAO::deleteContactCategoryWithCategory( $oCategory );
		
		//agregamos los nuevos.
		if( !empty($contacts) ){
			foreach ($contacts as $cd_contact) {
				if(is_numeric($cd_contact)) {
					
					$oContact = new Contact();
					$oContact->setCd_contact($cd_contact);
					$oContactCategory = new ContactCategory();
					$oContactCategory->setContact( $oContact );
					$oContactCategory->setCategory( $oCategory );
					
					ContactCategoryDAO::addContactCategory( $oContactCategory );
				}
			}
		}
	}


} 
?>
