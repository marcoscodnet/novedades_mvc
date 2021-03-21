<?php 

/** 
 * DAO para Contact 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Contact $oContact entity a persistir.
	 */
	public static function addContact(Contact $oContact) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_name = $oContact->getDs_name();
		
		$ds_mail = $oContact->getDs_mail();
		
		$ds_phone = $oContact->getDs_phone();
		
		$ds_movil = $oContact->getDs_movil();
		
		$ds_address = $oContact->getDs_address();
		
		$dt_birthday = $oContact->getDt_birthday();
		
		$bl_signed = $oContact->getBl_signed();
		
		$ds_company = $oContact->getDs_company();
		
		$bl_blocked = $oContact->getBl_blocked();
		
		
		$nu_hard =  CdtFormatUtils::ifEmpty( $oContact->getNu_hard(), 'null' );
		
		$nu_soft =  CdtFormatUtils::ifEmpty( $oContact->getNu_soft(), 'null' );
		
		
		$tableName = BOL_TABLE_CONTACT;
		
		$sql = "INSERT INTO $tableName (ds_name, ds_mail, ds_phone, ds_movil, ds_address, dt_birthday, bl_signed, nu_hard, nu_soft, ds_company, bl_blocked) VALUES('$ds_name', '$ds_mail', '$ds_phone', '$ds_movil', '$ds_address', '$dt_birthday', '$bl_signed', $nu_hard, $nu_soft, '$ds_company', '$bl_blocked')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oContact->setCd_contact( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Contact $oContact entity a modificar.
	 */
	public static function updateContact(Contact $oContact) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_name = $oContact->getDs_name();
		
		$ds_mail = $oContact->getDs_mail();
		
		$ds_phone = $oContact->getDs_phone();
		
		$ds_movil = $oContact->getDs_movil();
		
		$ds_address = $oContact->getDs_address();
		
		$dt_birthday = $oContact->getDt_birthday();
		
		$bl_signed = $oContact->getBl_signed();
		
		$ds_company = $oContact->getDs_company();
		
		$bl_blocked = $oContact->getBl_blocked();
		
		
		$cd_contact = CdtFormatUtils::ifEmpty( $oContact->getCd_contact(), 'null' );
		
		$nu_hard = CdtFormatUtils::ifEmpty( $oContact->getNu_hard(), 'null' );
		
		$nu_soft = CdtFormatUtils::ifEmpty( $oContact->getNu_soft(), 'null' );
		
		

		$tableName = BOL_TABLE_CONTACT;
		
		$sql = "UPDATE $tableName SET ds_name = '$ds_name', ds_mail = '$ds_mail', ds_phone = '$ds_phone', ds_movil = '$ds_movil', ds_address = '$ds_address', dt_birthday = '$dt_birthday', bl_signed = '$bl_signed', nu_hard = $nu_hard, nu_soft = $nu_soft, ds_company = '$ds_company', bl_blocked = '$bl_blocked' WHERE cd_contact = $cd_contact "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Contact $oContact entity a eliminar.
	 */
	public static function deleteContact(Contact $oContact) { 
		$db = CdtDbManager::getConnection(); 

		$cd_contact = $oContact->getCd_contact();

		$tableName = BOL_TABLE_CONTACT;
		
		$sql = "DELETE FROM $tableName WHERE cd_contact = $cd_contact "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Contact]
	 */
	public static function getContacts(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACT;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new ContactFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getContactsCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACT;
		
		$sql = "SELECT count(*) as count FROM $tableName "; 
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
	 * @return Contact
	 */
	public static function getContact(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACT;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new ContactFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}
	
	public static function getCategories($cd_contact) {
		$db = CdtDbManager::getConnection(); 

		$oCriteria = new CdtSearchCriteria();
        $oCriteria->addFilter("cd_contact", $cd_contact, "=");
        
		$tableName = BOL_TABLE_CATEGORY;
		$tableName2 = BOL_TABLE_CONTACTCATEGORY;

		$sql = "SELECT C.* FROM $tableName C";
		$sql .= " LEFT JOIN $tableName2 CC ON(C.cd_category=CC.cd_category) ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new CategoryFactory());
		$db->sql_freeresult($result);
		return $items;
		
	} 

} 
?>
