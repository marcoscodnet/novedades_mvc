<?php 

/** 
 * DAO para ContactSendingNewsletter 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactSendingNewsletterDAO { 

	/**
	 * se persiste la nueva entity
	 * @param ContactSendingNewsletter $oContactSendingNewsletter entity a persistir.
	 */
	public static function addContactSendingNewsletter(ContactSendingNewsletter $oContactSendingNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		$dt_date = $oContactSendingNewsletter->getDt_date();
		
		$ds_time = $oContactSendingNewsletter->getDs_time();
		
		$bl_sent = $oContactSendingNewsletter->getBl_sent();
		
		$dt_sent = $oContactSendingNewsletter->getDt_sent();
		
		$bl_processed = $oContactSendingNewsletter->getBl_processed();
		
		$bl_open = $oContactSendingNewsletter->getBl_open();
		
		
		$cd_sending_newsletter =  CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_sending_newsletter(), 'null' );
		
		$cd_contact =  CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_contact(), 'null' );
		
		$cd_category =  CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_category(), 'null' );
		
		$nu_hard =  CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getNu_hard(), 'null' );
		
		$nu_soft =  CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getNu_soft(), 'null' );
		
		
		$tableName = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		
		$sql = "INSERT INTO $tableName (cd_sending_newsletter, cd_contact, cd_category, dt_date, ds_time, bl_sent, dt_sent, nu_hard, nu_soft, bl_processed, bl_open) VALUES($cd_sending_newsletter, $cd_contact, $cd_category, '$dt_date', '$ds_time', '$bl_sent', '$dt_sent', $nu_hard, $nu_soft, '$bl_processed', '$bl_open')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oContactSendingNewsletter->setCd_contact_sending_newsletter( $cd );
	}


	/**
	 * se modifica la entity
	 * @param ContactSendingNewsletter $oContactSendingNewsletter entity a modificar.
	 */
	public static function updateContactSendingNewsletter(ContactSendingNewsletter $oContactSendingNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		$dt_date = $oContactSendingNewsletter->getDt_date();
		
		$ds_time = $oContactSendingNewsletter->getDs_time();
		
		$bl_sent = $oContactSendingNewsletter->getBl_sent();
		
		$dt_sent = $oContactSendingNewsletter->getDt_sent();
		
		$bl_processed = $oContactSendingNewsletter->getBl_processed();
		
		$bl_open = $oContactSendingNewsletter->getBl_open();
		
		
		$cd_contact_sending_newsletter = CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_contact_sending_newsletter(), 'null' );
		
		$cd_sending_newsletter = CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_sending_newsletter(), 'null' );
		
		$cd_contact = CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_contact(), 'null' );
		
		$cd_category = CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getCd_category(), 'null' );
		
		$nu_hard = CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getNu_hard(), 'null' );
		
		$nu_soft = CdtFormatUtils::ifEmpty( $oContactSendingNewsletter->getNu_soft(), 'null' );
		
		

		$tableName = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		
		$sql = "UPDATE $tableName SET cd_sending_newsletter = $cd_sending_newsletter, cd_contact = $cd_contact, cd_category = $cd_category, dt_date = '$dt_date', ds_time = '$ds_time', bl_sent = '$bl_sent', dt_sent = '$dt_sent', nu_hard = $nu_hard, nu_soft = $nu_soft, bl_processed = '$bl_processed', bl_open = '$bl_open' WHERE cd_contact_sending_newsletter = $cd_contact_sending_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param ContactSendingNewsletter $oContactSendingNewsletter entity a eliminar.
	 */
	public static function deleteContactSendingNewsletter(ContactSendingNewsletter $oContactSendingNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		$cd_contact_sending_newsletter = $oContactSendingNewsletter->getCd_contact_sending_newsletter();

		$tableName = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		
		$sql = "DELETE FROM $tableName WHERE cd_contact_sending_newsletter = $cd_contact_sending_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[ContactSendingNewsletter]
	 */
	public static function getContactSendingNewsletters(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		$tableName2 = BOL_TABLE_SENDINGNEWSLETTER;
		$tableName3 = BOL_TABLE_NEWSLETTER;
		$tableName4 = BOL_TABLE_CATEGORY;
		$tableName5 = BOL_TABLE_CONTACT;
		
		
		$sql = "SELECT CSN.*, N.ds_newsletter, C.ds_category, CO.ds_name, CO.ds_mail, CO.ds_company FROM $tableName CSN";
		$sql .= " LEFT JOIN $tableName2 SN ON(SN.cd_sending_newsletter=CSN.cd_sending_newsletter) ";
		$sql .= " LEFT JOIN $tableName3 N ON(SN.cd_newsletter=N.cd_newsletter) ";
		$sql .= " LEFT JOIN $tableName4 C ON(CSN.cd_category=C.cd_category) ";
		$sql .= " LEFT JOIN $tableName5 CO ON(CSN.cd_contact=CO.cd_contact) ";
		 
		$sql .= $oCriteria->buildCriteria();
		//echo $sql;
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new ContactSendingNewsletterFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getContactSendingNewslettersCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		$tableName2 = BOL_TABLE_SENDINGNEWSLETTER;
		$tableName3 = BOL_TABLE_NEWSLETTER;
		$tableName4 = BOL_TABLE_CATEGORY;
		$tableName5 = BOL_TABLE_CONTACT;
		
		
		$sql = "SELECT count(*) as count FROM $tableName CSN";
		$sql .= " LEFT JOIN $tableName2 SN ON(SN.cd_sending_newsletter=CSN.cd_sending_newsletter) ";
		$sql .= " LEFT JOIN $tableName3 N ON(SN.cd_newsletter=N.cd_newsletter) ";
		$sql .= " LEFT JOIN $tableName4 C ON(CSN.cd_category=C.cd_category) ";
		$sql .= " LEFT JOIN $tableName5 CO ON(CSN.cd_contact=CO.cd_contact) ";
		
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
	 * @return ContactSendingNewsletter
	 */
	public static function getContactSendingNewsletter(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		$tableName2 = BOL_TABLE_SENDINGNEWSLETTER;
		$tableName3 = BOL_TABLE_NEWSLETTER;
		$tableName4 = BOL_TABLE_CATEGORY;
		$tableName5 = BOL_TABLE_CONTACT;
		
		
		$sql = "SELECT CSN.*, N.ds_newsletter, C.ds_category, CO.ds_name, CO.ds_mail FROM $tableName CSN";
		$sql .= " LEFT JOIN $tableName2 SN ON(SN.cd_sending_newsletter=CSN.cd_sending_newsletter) ";
		$sql .= " LEFT JOIN $tableName3 N ON(SN.cd_newsletter=N.cd_newsletter) ";
		$sql .= " LEFT JOIN $tableName4 C ON(CSN.cd_category=C.cd_category) ";
		$sql .= " LEFT JOIN $tableName5 CO ON(CSN.cd_contact=CO.cd_contact) ";
		 
		$sql .= $oCriteria->buildCriteria();

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new ContactSendingNewsletterFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
