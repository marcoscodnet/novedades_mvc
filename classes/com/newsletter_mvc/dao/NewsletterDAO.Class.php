<?php 

/** 
 * DAO para Newsletter 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Newsletter $oNewsletter entity a persistir.
	 */
	public static function addNewsletter(Newsletter $oNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		$dt_date = $oNewsletter->getDt_date();
		
		$ds_newsletter = $oNewsletter->getDs_newsletter();
		
		$ds_text = $oNewsletter->getDs_text();
		
		$ds_text2 = $oNewsletter->getDs_text2();
		
		$ds_text3 = $oNewsletter->getDs_text3();
		
		$ds_mail = $oNewsletter->getDs_mail();
		
		$bl_twitter = $oNewsletter->getBl_twitter();
		
		$bl_facebook = $oNewsletter->getBl_facebook();
		
		$ds_linkheader = $oNewsletter->getDs_linkheader();
		
		$ds_linkfooter = $oNewsletter->getDs_linkfooter();
		
		$cd_user =  CdtFormatUtils::ifEmpty( $oNewsletter->getCd_user(), 'null' );
		
		$cd_template =  CdtFormatUtils::ifEmpty( $oNewsletter->getCd_template(), 'null' );
		
		$cd_status =  CdtFormatUtils::ifEmpty( $oNewsletter->getCd_status(), 'null' );
		
		$bl_linkedin = $oNewsletter->getBl_linkedin();
		
		$img_header = $oNewsletter->getImg_header();
		
		$img_footer = $oNewsletter->getImg_footer();
		
		$tableName = BOL_TABLE_NEWSLETTER;
		
		$sql = "INSERT INTO $tableName (cd_user, cd_template, dt_date, ds_newsletter, ds_text, ds_text2, ds_text3, ds_mail, cd_status, bl_twitter, bl_facebook, ds_linkheader, ds_linkfooter, bl_linkedin, img_footer, img_header) VALUES($cd_user, $cd_template, '$dt_date', '$ds_newsletter', '$ds_text', '$ds_text2', '$ds_text3', '$ds_mail', $cd_status, '$bl_twitter', '$bl_facebook', '$ds_linkheader', '$ds_linkfooter', '$bl_linkedin', '$img_footer', '$img_header' )"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oNewsletter->setCd_newsletter( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Newsletter $oNewsletter entity a modificar.
	 */
	public static function updateNewsletter(Newsletter $oNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		$dt_date = $oNewsletter->getDt_date();
		
		$ds_newsletter = $oNewsletter->getDs_newsletter();
		
		$ds_text = $oNewsletter->getDs_text();
		
		$ds_text2 = $oNewsletter->getDs_text2();
		
		$ds_text3 = $oNewsletter->getDs_text3();
		
		$ds_mail = $oNewsletter->getDs_mail();
		
		$bl_twitter = $oNewsletter->getBl_twitter();
		
		$bl_facebook = $oNewsletter->getBl_facebook();
		
		$ds_linkheader = $oNewsletter->getDs_linkheader();
		
		$ds_linkfooter = $oNewsletter->getDs_linkfooter();
		
		$cd_newsletter = CdtFormatUtils::ifEmpty( $oNewsletter->getCd_newsletter(), 'null' );
		
		$cd_user = CdtFormatUtils::ifEmpty( $oNewsletter->getCd_user(), 'null' );
		
		$cd_template = CdtFormatUtils::ifEmpty( $oNewsletter->getCd_template(), 'null' );
		
		$cd_status = CdtFormatUtils::ifEmpty( $oNewsletter->getCd_status(), 'null' );
		
		$bl_linkedin = $oNewsletter->getBl_linkedin();
		
		$img_header = $oNewsletter->getImg_header();
		
		$img_footer = $oNewsletter->getImg_footer();

		$tableName = BOL_TABLE_NEWSLETTER;
		
		$sql = "UPDATE $tableName SET cd_user = $cd_user, cd_template = $cd_template, dt_date = '$dt_date', ds_newsletter = '$ds_newsletter', ds_text = '$ds_text', ds_text2 = '$ds_text2', ds_text3 = '$ds_text3', ds_mail = '$ds_mail', cd_status = $cd_status, bl_twitter = '$bl_twitter', bl_facebook = '$bl_facebook', ds_linkheader = '$ds_linkheader', ds_linkfooter = '$ds_linkfooter', bl_linkedin = '$bl_linkedin', img_header = '$img_header', img_footer = '$img_footer' WHERE cd_newsletter = $cd_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}
	
/**
	 * se modifica la entity
	 * @param Newsletter $oNewsletter entity a modificar.
	 */
	public static function updateNewsletterImages(Newsletter $oNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		
		
		
		$cd_newsletter = CdtFormatUtils::ifEmpty( $oNewsletter->getCd_newsletter(), 'null' );
		
		
		
		$img_header = $oNewsletter->getImg_header();
		
		$img_footer = $oNewsletter->getImg_footer();

		$tableName = BOL_TABLE_NEWSLETTER;
		
		$sql = "UPDATE $tableName SET img_header = '$img_header', img_footer = '$img_footer' WHERE cd_newsletter = $cd_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Newsletter $oNewsletter entity a eliminar.
	 */
	public static function deleteNewsletter(Newsletter $oNewsletter) { 
		$db = CdtDbManager::getConnection(); 

		$cd_newsletter = $oNewsletter->getCd_newsletter();

		$tableName = BOL_TABLE_NEWSLETTER;
		
		$sql = "DELETE FROM $tableName WHERE cd_newsletter = $cd_newsletter "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Newsletter]
	 */
	public static function getNewsletters(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_NEWSLETTER;
		$tableName2 = BOL_TABLE_STATUS;
		$tableName3 = BOL_TABLE_TEMPLATE;
		
		$sql = "SELECT N.*, S.ds_status, T.ds_path FROM $tableName N";
		$sql .= " LEFT JOIN $tableName2 S ON(N.cd_status=S.cd_status) ";
		$sql .= " LEFT JOIN $tableName3 T ON(N.cd_template=T.cd_template) ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new NewsletterFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getNewslettersCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_NEWSLETTER;
		$tableName2 = BOL_TABLE_STATUS;
		$tableName3 = BOL_TABLE_TEMPLATE;

		$sql = "SELECT count(*) as count FROM $tableName N";
		$sql .= " LEFT JOIN $tableName2 S ON(N.cd_status=S.cd_status) ";
		$sql .= " LEFT JOIN $tableName3 T ON(N.cd_template=T.cd_template) ";
		
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
	 * @return Newsletter
	 */
	public static function getNewsletter(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_NEWSLETTER;
		$tableName2 = BOL_TABLE_STATUS;
		$tableName3 = BOL_TABLE_TEMPLATE;

		$sql = "SELECT N.*, S.ds_status, T.ds_path FROM $tableName N";
		$sql .= " LEFT JOIN $tableName2 S ON(N.cd_status=S.cd_status) ";
		$sql .= " LEFT JOIN $tableName3 T ON(N.cd_template=T.cd_template) ";
		
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new NewsletterFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
