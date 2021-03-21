<?php 

/** 
 * DAO para ContactCategory 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactCategoryDAO { 

	/**
	 * se persiste la nueva entity
	 * @param ContactCategory $oContactCategory entity a persistir.
	 */
	public static function addContactCategory(ContactCategory $oContactCategory) { 
		$db = CdtDbManager::getConnection(); 

		
		
		$cd_contact =  CdtFormatUtils::ifEmpty( $oContactCategory->getCd_contact(), 'null' );
		
		$cd_category =  CdtFormatUtils::ifEmpty( $oContactCategory->getCd_category(), 'null' );
		
		
		$tableName = BOL_TABLE_CONTACTCATEGORY;
		
		$sql = "INSERT INTO $tableName (cd_contact, cd_category) VALUES($cd_contact, $cd_category)"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oContactCategory->setCd_contact_category( $cd );
	}


	/**
	 * se modifica la entity
	 * @param ContactCategory $oContactCategory entity a modificar.
	 */
	public static function updateContactCategory(ContactCategory $oContactCategory) { 
		$db = CdtDbManager::getConnection(); 

		
		
		$cd_contact_category = CdtFormatUtils::ifEmpty( $oContactCategory->getCd_contact_category(), 'null' );
		
		$cd_contact = CdtFormatUtils::ifEmpty( $oContactCategory->getCd_contact(), 'null' );
		
		$cd_category = CdtFormatUtils::ifEmpty( $oContactCategory->getCd_category(), 'null' );
		
		

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		
		$sql = "UPDATE $tableName SET cd_contact = $cd_contact, cd_category = $cd_category WHERE cd_contact_category = $cd_contact_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param ContactCategory $oContactCategory entity a eliminar.
	 */
	public static function deleteContactCategory(ContactCategory $oContactCategory) { 
		$db = CdtDbManager::getConnection(); 

		$cd_contact_category = $oContactCategory->getCd_contact_category();

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		
		$sql = "DELETE FROM $tableName WHERE cd_contact_category = $cd_contact_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	
	public static function deleteContactCategoryWithContact(Contact $oContact) {  
		$db = CdtDbManager::getConnection(); 

		$cd_contact = $oContact->getCd_contact();

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		
		$sql = "DELETE FROM $tableName WHERE cd_contact = $cd_contact "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}	
	
	public static function deleteContactCategoryWithCategory(Category $oCategory) {  
		$db = CdtDbManager::getConnection(); 

		$cd_category = $oCategory->getCd_category();

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		
		$sql = "DELETE FROM $tableName WHERE cd_category = $cd_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}	

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[ContactCategory]
	 */
	public static function getContactCategories(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		$tableName2 = BOL_TABLE_CONTACT;
		$tableName3 = BOL_TABLE_CATEGORY;

		$sql = "SELECT DISTINCT C.cd_contact, C.ds_name, C.ds_mail, C.ds_company FROM $tableName2 C";
		$sql .= " LEFT JOIN $tableName CC ON(C.cd_contact=CC.cd_contact) ";
		$sql .= " LEFT JOIN $tableName3 CA ON(CA.cd_category=CC.cd_category) ";
		 
		$sql .= $oCriteria->buildCriteria();
		//echo $sql;
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new ContactCategoryFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getContactCategoriesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		$tableName2 = BOL_TABLE_CONTACT;
		$tableName3 = BOL_TABLE_CATEGORY;
		
		$sql = "SELECT count(DISTINCT C.cd_contact) as count FROM $tableName2 C";
		$sql .= " LEFT JOIN $tableName CC ON(C.cd_contact=CC.cd_contact) ";
		$sql .= " LEFT JOIN $tableName3 CA ON(CA.cd_category=CC.cd_category) ";
		//TODO left joins
		
		$sql .= $oCriteria->buildCriteriaWithoutPaging();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$next = $db->sql_fetchassoc($result);
		$cant = $next['count'];
		$db->sql_freeresult($result);
		return ((int) $cant);
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ContactCategory
	 */
	public static function getContactCategory(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACTCATEGORY;
		$tableName2 = BOL_TABLE_CONTACT;
		$tableName3 = BOL_TABLE_CATEGORY;

		$sql = "SELECT CC.*, C.ds_name, C.ds_mail, C.ds_company, CA.ds_category FROM $tableName CC";
		$sql .= " LEFT JOIN $tableName2 C ON(C.cd_contact=CC.cd_contact) ";
		$sql .= " LEFT JOIN $tableName3 CA ON(CA.cd_category=CC.cd_category) ";
		
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new ContactCategoryFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
