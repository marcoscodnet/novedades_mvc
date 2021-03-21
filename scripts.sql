CREATE TABLE IF NOT EXISTS `bol_item` (
  `cd_item` int(11) NOT NULL AUTO_INCREMENT,
  `cd_newsletter` int(11) NOT NULL,
  `nu_order` int(11) NOT NULL,
  `ds_item` text COLLATE utf8_unicode_ci,
  `ds_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cd_item`),
  KEY `cd_newsletter` (`cd_newsletter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;

ALTER TABLE `bol_item`
	ADD CONSTRAINT `FK_bol_item_bol_newsletter` FOREIGN KEY (`cd_newsletter`) REFERENCES `bol_newsletter` (`cd_newsletter`);


###############################Desbloquear 100 contactos en svs#########################################################################3
SELECT *
FROM `bol_contact`
WHERE `nu_hard` =1
AND bl_signed =1
ORDER BY `bol_contact`.`ds_mail` ASC
LIMIT 0 , 100;

UPDATE bol_contact SET nu_hard=0, bl_blocked=0
WHERE nu_hard =1
		AND bl_signed =1 
		ORDER BY ds_mail ASC
		LIMIT 100;

