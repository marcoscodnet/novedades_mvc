<?php 

/** 
 * DAO para SendingNewsletter 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class SendingNewsletterDAO { 

	/**
	 * se persiste la nueva entity
	 * @param SendingNewsletter $oSendingNewsletter entity a persistir.
	 */
	public static function addSendingNewsletter(SendingNewsletter $oSendingNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		$dt_date = $oSendingNewsletter->getDt_date();
		
		$ds_time = $oSendingNewsletter->getDs_time();
		
		$bl_sent = $oSendingNewsletter->getBl_sent();
		
		
		$cd_newsletter =  CdtFormatUtils::ifEmpty( $oSendingNewsletter->getCd_newsletter(), 'null' );
		
		
		$tableName = BOL_TABLE_SENDINGNEWSLETTER;
		
		$sql = "INSERT INTO $tableName (cd_newsletter, dt_date, ds_time, bl_sent) VALUES($cd_newsletter, '$dt_date', '$ds_time', '$bl_sent')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oSendingNewsletter->setCd_sending_newsletter( $cd );
	}


	/**
	 * se modifica la entity
	 * @param SendingNewsletter $oSendingNewsletter entity a modificar.
	 */
	public static function updateSendingNewsletter(SendingNewsletter $oSendingNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		$dt_date = $oSendingNewsletter->getDt_date();
		
		$ds_time = $oSendingNewsletter->getDs_time();
		
		$bl_sent = $oSendingNewsletter->getBl_sent();
		
		
		$cd_sending_newsletter = CdtFormatUtils::ifEmpty( $oSendingNewsletter->getCd_sending_newsletter(), 'null' );
		
		$cd_newsletter = CdtFormatUtils::ifEmpty( $oSendingNewsletter->getCd_newsletter(), 'null' );
		
		$cd_status = CdtFormatUtils::ifEmpty( $oSendingNewsletter->getCd_status(), 'null' );
		
		

		$tableName = BOL_TABLE_SENDINGNEWSLETTER;
		
		$sql = "UPDATE $tableName SET cd_newsletter = $cd_newsletter, dt_date = '$dt_date', ds_time = '$ds_time', bl_sent = '$bl_sent', cd_status = '$cd_status' WHERE cd_sending_newsletter = $cd_sending_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param SendingNewsletter $oSendingNewsletter entity a eliminar.
	 */
	public static function deleteSendingNewsletter(SendingNewsletter $oSendingNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		$cd_sending_newsletter = $oSendingNewsletter->getCd_sending_newsletter();

		$tableName = BOL_TABLE_SENDINGNEWSLETTER;
		
		
		$sql = "DELETE FROM $tableName WHERE cd_sending_newsletter = $cd_sending_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[SendingNewsletter]
	 */
	public static function getSendingNewsletters(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_SENDINGNEWSLETTER;
		$tableName2 = BOL_TABLE_NEWSLETTER;
		$tableName3 = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		$tableName4 = BOL_TABLE_STATUS;

		$sql = "SELECT SN.*, S.*,N.ds_newsletter, SUM(CSN.nu_soft) AS nu_soft, SUM(CSN.nu_hard) AS nu_hard , SUM(CSN.bl_open) AS nu_open, count(CSN.cd_contact) AS nu_sent FROM $tableName SN ";
		$sql .= " LEFT JOIN $tableName2 N ON(SN.cd_newsletter=N.cd_newsletter) ";
		$sql .= " LEFT JOIN $tableName3 CSN ON(SN.cd_sending_newsletter=CSN.cd_sending_newsletter) ";
		$sql .= " LEFT JOIN $tableName4 S ON(SN.cd_status=S.cd_status) ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new SendingNewsletterFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getSendingNewslettersCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_SENDINGNEWSLETTER;
		$tableName2 = BOL_TABLE_NEWSLETTER;
		$tableName3 = BOL_TABLE_STATUS;
		

		$sql = "SELECT count(*) as count FROM $tableName SN ";
		$sql .= " LEFT JOIN $tableName2 N ON(SN.cd_newsletter=N.cd_newsletter) ";
		$sql .= " LEFT JOIN $tableName3 S ON(SN.cd_status=S.cd_status) ";
		
		 
		
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
	 * @return SendingNewsletter
	 */
	public static function getSendingNewsletter(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_SENDINGNEWSLETTER;
		$tableName2 = BOL_TABLE_NEWSLETTER;
		$tableName3 = BOL_TABLE_CONTACTSENDINGNEWSLETTER;
		$tableName4 = BOL_TABLE_STATUS;

		$sql = "SELECT SN.*, S.*,N.ds_newsletter, SUM(CSN.nu_soft) AS nu_soft, SUM(CSN.nu_hard) AS nu_hard , SUM(CSN.bl_open) AS nu_open, count(CSN.cd_contact) AS nu_sent FROM $tableName SN ";
		$sql .= " LEFT JOIN $tableName2 N ON(SN.cd_newsletter=N.cd_newsletter) ";
		$sql .= " LEFT JOIN $tableName3 CSN ON(SN.cd_sending_newsletter=CSN.cd_sending_newsletter) ";
		$sql .= " LEFT JOIN $tableName4 S ON(SN.cd_status=S.cd_status) ";
		 
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new SendingNewsletterFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}
	
	public static function setInnodbLockWaitTimeout( $size="900" ){
 
	  $db = CdtDbManager::getConnection();
	 
	  $sql = "set innodb_lock_wait_timeout=$size";
	  $result = $db->sql_query($sql);
	  if (!$result)//hubo un error en la bbdd.
	   throw new DBException($db->sql_error());
	   
	   $sql = "select @@innodb_lock_wait_timeout";
	  $result = $db->sql_query($sql);
	  CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
 
 	}

} 
?>
