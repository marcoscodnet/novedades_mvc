<?php 

/** 
 * DAO para NewsletterImage 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterImageDAO { 

	/**
	 * se persiste la nueva entity
	 * @param NewsletterImage $oNewsletterImage entity a persistir.
	 */
	public static function addNewsletterImage(NewsletterImage $oNewsletterImage) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_newsletter_image = $oNewsletterImage->getDs_newsletter_image();
		
		$ds_path = $oNewsletterImage->getDs_path();
		
		
		$cd_newsletter =  CdtFormatUtils::ifEmpty( $oNewsletterImage->getCd_newsletter(), 'null' );
		
		$nu_order =  CdtFormatUtils::ifEmpty( $oNewsletterImage->getNu_order(), 'null' );
		
		
		$tableName = BOL_TABLE_NEWSLETTERIMAGE;
		
		$sql = "INSERT INTO $tableName (ds_newsletter_image, ds_path, cd_newsletter, nu_order) VALUES('$ds_newsletter_image', '$ds_path', $cd_newsletter, $nu_order)"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oNewsletterImage->setCd_newsletter_image( $cd );
	}


	/**
	 * se modifica la entity
	 * @param NewsletterImage $oNewsletterImage entity a modificar.
	 */
	public static function updateNewsletterImage(NewsletterImage $oNewsletterImage) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_newsletter_image = $oNewsletterImage->getDs_newsletter_image();
		
		$ds_path = $oNewsletterImage->getDs_path();
		
		
		$cd_newsletter_image = CdtFormatUtils::ifEmpty( $oNewsletterImage->getCd_newsletter_image(), 'null' );
		
		$cd_newsletter = CdtFormatUtils::ifEmpty( $oNewsletterImage->getCd_newsletter(), 'null' );
		
		$nu_order = CdtFormatUtils::ifEmpty( $oNewsletterImage->getNu_order(), 'null' );
		
		

		$tableName = BOL_TABLE_NEWSLETTERIMAGE;
		
		$sql = "UPDATE $tableName SET ds_newsletter_image = '$ds_newsletter_image', ds_path = '$ds_path', cd_newsletter = $cd_newsletter, nu_order = $nu_order WHERE cd_newsletter_image = $cd_newsletter_image "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param NewsletterImage $oNewsletterImage entity a eliminar.
	 */
	public static function deleteNewsletterImage(NewsletterImage $oNewsletterImage) { 
		$db = CdtDbManager::getConnection(); 

		$cd_newsletter_image = $oNewsletterImage->getCd_newsletter_image();

		$tableName = BOL_TABLE_NEWSLETTERIMAGE;
		
		$sql = "DELETE FROM $tableName WHERE cd_newsletter_image = $cd_newsletter_image "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[NewsletterImage]
	 */
	public static function getNewsletterImages(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_NEWSLETTERIMAGE;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new NewsletterImageFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getNewsletterImagesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_NEWSLETTERIMAGE;
		
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
	 * @return NewsletterImage
	 */
	public static function getNewsletterImage(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_NEWSLETTERIMAGE;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new NewsletterImageFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
