<?php

/**
 * se definen los mensajes del sistema .
 * 
 * @author modelBuilder
 * 
 */

//mensajes comunes.
define('BOL_LBL_BACK', 'Volver', true);
define('BOL_LBL_SAVE', 'Guardar', true);
define('BOL_LBL_CANCEL', 'Cancelar', true);
define('BOL_LBL_DELETE', 'Eliminar', true);
define('BOL_LBL_PREVIEW', 'Vista Previa', true);
define('BOL_NAME_PREVIEW', 'Vista_Previa', true);
define('BOL_LBL_YES', 'Si', true);
define('BOL_LBL_NO', 'No', true);
define('BOL_LBL_CLOSE', 'Cerrar', true);
define('BOL_LBL_SELECT', 'Seleccionar', true);
define('BOL_MSG_REQUIRED_FIELDS', 'Campos requeridos', true);
define('BOL_LBL_IMPORT', 'Importar', true);
define('BOL_LBL_GENERATE_CODE', 'Generar código', true);
define('BOL_LBL_SUBSCRIBE', 'Suscribirse', true);
define('BOL_LBL_ACCEPT', 'Aceptar', true);
define('BOL_LBL_GENERATE_CODE_NAME', 'generate_code', true);
define('BOL_MSG_EMAIL_WRONG_STATUS', 'Estado: no importado porque el e-mail es erróneo', true);
define('BOL_MSG_FIELDS_WRONG_STATUS', 'Estado: no importado porque la cantidad de campos es errónea', true);
define('BOL_MSG_EXIST_CATEGORY_STATUS', 'Estado: no importado ya formaba parte de la Categoría', true);
define('BOL_MSG_INSERTED_STATUS', 'Estado: contacto insertado', true);
define('BOL_MSG_UPDATED_STATUS', 'Estado: contacto actualizado', true);
define('BOL_MSG_VIEW_LOG', 'Ver registro de importación', true);
define('BOL_MSG_SENDINGNEWSLETTER_SUCCESS', 'Boletín enviado', true);
define('BOL_MSG_SENDINGNEWSLETTER_ERROR', 'Boletín no enviado intente nuevamente', true);
define('BOL_MSG_FACEBOOK_LIKE', 'Me gusta', true);
define('BOL_MSG_URL_INVALID', 'URL inválida (Ej: http://www.url.com)', true);
define('BOL_MSG_CLICK_AQUI', 'Click aqu�', true);


define('BOL_MSG_INVALID_NUMBER', 'Entrada no válida', true);
define('BOL_MSG_INVALID_DATE', 'Fecha inválida', true);
define('BOL_MSG_CONFIRM_DELETE_QUESTION',  'Confirma eliminar el item?', true  );
define('BOL_MSG_INVALID_MAIL', 'E-Mail inválido', true);
define('BOL_MSG_INVALID_IMAGE', 'Imagen no válida', true);
define('BOL_MSG_CONFIRM_DELETE_QUESTION_ANYWAY',  'Tiene envíos realizados ¿Confirma eliminar el item?', true  );

define( 'CDT_CMP_GRID_MSG_VIEW',  'Ver' );

//messages para cdt_usergroup_function
//títulos de las actions
define('BOL_MSG_CATEGORY_TITLE', 'Categoría', true);
define('BOL_MSG_CATEGORY_TITLE_LIST', 'Listar Categorías', true);
define('BOL_MSG_CATEGORY_TITLE_ADD', 'Agregar Categoría', true);
define('BOL_MSG_CATEGORY_TITLE_UPDATE', 'Modificar Categoría', true);
define('BOL_MSG_CATEGORY_TITLE_VIEW', 'Ver Categoría', true);
define('BOL_MSG_CATEGORY_TITLE_XLS', 'Xls Categoría', true);

define('BOL_MSG_CATEGORY_CD_CATEGORY_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_CATEGORY_DS_CATEGORY_REQUIRED', 'Descripción requerido', true);

//títulos de las actions
define('BOL_MSG_CONTACT_TITLE', 'Contacto', true);
define('BOL_MSG_CONTACT_TITLE_LIST', 'Listar Contactos', true);
define('BOL_MSG_CONTACT_TITLE_ADD', 'Agregar Contacto', true);
define('BOL_MSG_CONTACT_TITLE_UPDATE', 'Modificar Contacto', true);
define('BOL_MSG_CONTACT_TITLE_VIEW', 'Ver Contacto', true);
define('BOL_MSG_CONTACT_TITLE_XLS', 'Xls Contacto', true);
define('BOL_MSG_CONTACTS_TITLE', 'Contactos', true);
define('BOL_MSG_CONTACTS_TITLE_IMPORT', 'Importar contactos', true);

define('BOL_MSG_CONTACT_CD_CONTACT_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_CONTACT_DS_NAME_REQUIRED', 'Nombre requerido', true);
define('BOL_MSG_CONTACT_DS_MAIL_REQUIRED', 'E-mail requerido', true);
define('BOL_MSG_CONTACT_DS_PHONE_REQUIRED', 'Teléfono requerido', true);
define('BOL_MSG_CONTACT_DS_MOVIL_REQUIRED', 'Celular requerido', true);
define('BOL_MSG_CONTACT_DS_ADDRESS_REQUIRED', 'Dirección requerido', true);
define('BOL_MSG_CONTACT_DT_BIRTHDAY_REQUIRED', 'Nacimiento requerido', true);
define('BOL_MSG_CONTACT_BL_SIGNED_REQUIRED', 'Suscripto requerido', true);
define('BOL_MSG_CONTACT_NU_HARD_REQUIRED', 'Rebote Duro requerido', true);
define('BOL_MSG_CONTACT_NU_SOFT_REQUIRED', 'Rebote Blando requerido', true);
define('BOL_MSG_CONTACT_DS_COMPANY_REQUIRED', 'Empresa requerido', true);
define('BOL_MSG_CONTACT_BL_BLOCKED_REQUIRED', 'Bloqueado requerido', true);

//títulos de las actions
define('BOL_MSG_CONTACTCATEGORY_TITLE_LIST', 'Listar Contacto-Categorías', true);
define('BOL_MSG_CONTACTCATEGORY_TITLE_ADD', 'Agregar Contacto-Categoría', true);
define('BOL_MSG_CONTACTCATEGORY_TITLE_UPDATE', 'Modificar Contacto-Categoría', true);
define('BOL_MSG_CONTACTCATEGORY_TITLE_VIEW', 'Ver Contacto-Categoría', true);
define('BOL_MSG_CONTACTCATEGORY_TITLE_XLS', 'Xls Contacto-Categoría', true);

define('BOL_MSG_CONTACTCATEGORY_CD_CONTACT_CATEGORY_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_CONTACTCATEGORY_CD_CONTACT_REQUIRED', 'Contacto requerido', true);
define('BOL_MSG_CONTACTCATEGORY_CD_CATEGORY_REQUIRED', 'Categoría requerido', true);

//títulos de las actions
define('BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_LIST', 'Listar Contactos de los boletines enviados', true);

define('BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_VIEW', 'Ver Contactos de los boletines enviados', true);
define('BOL_MSG_CONTACTSENDINGNEWSLETTER_TITLE_XLS', 'Xls Contactos de los boletines enviados', true);
define('BOL_MSG_CONTACTSENDINGNEWSLETTER_ACTION', 'Acción', true);
define('BOL_MSG_CONTACTSENDINGNEWSLETTER_BOUNCE', 'Rebote', true);
define('BOL_MSG_CONTACTSENDINGNEWSLETTER_HARD', 'Duro', true);
define('BOL_MSG_CONTACTSENDINGNEWSLETTER_SOFT', 'Blando', true);




//títulos de las actions
define('BOL_MSG_IMAGE_TITLE_LIST', 'Listar Imágenes', true);
define('BOL_MSG_IMAGE_TITLE_ADD', 'Agregar Imagen', true);
define('BOL_MSG_IMAGE_TITLE_UPDATE', 'Modificar Imagen', true);
define('BOL_MSG_IMAGE_TITLE_VIEW', 'Ver Imagen', true);
define('BOL_MSG_IMAGE_TITLE_XLS', 'Xls Imagen', true);

define('BOL_MSG_IMAGE_CD_IMAGE_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_IMAGE_CD_IMAGE_CATEGORY_REQUIRED', 'Categoría-Imagen requerido', true);
define('BOL_MSG_IMAGE_CD_TEMPLATE_REQUIRED', 'Plantilla requerido', true);
define('BOL_MSG_IMAGE_DS_IMAGE_REQUIRED', 'Nombre requerido', true);
define('BOL_MSG_IMAGE_NU_SIZE_REQUIRED', 'Tamaño requerido', true);
define('BOL_MSG_IMAGE_DS_TYPE_REQUIRED', 'Tipo requerido', true);
define('BOL_MSG_IMAGE_DT_DATE_REQUIRED', 'Fecha requerido', true);

//títulos de las actions
define('BOL_MSG_IMAGECATEGORY_TITLE_LIST', 'Listar Categorías-Imágenes', true);
define('BOL_MSG_IMAGECATEGORY_TITLE_ADD', 'Agregar Categoría-Imagen', true);
define('BOL_MSG_IMAGECATEGORY_TITLE_UPDATE', 'Modificar Categoría-Imagen', true);
define('BOL_MSG_IMAGECATEGORY_TITLE_VIEW', 'Ver Categoría-Imagen', true);
define('BOL_MSG_IMAGECATEGORY_TITLE_XLS', 'Xls Categoría-Imagen', true);

define('BOL_MSG_IMAGECATEGORY_CD_IMAGE_CATEGORY_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_IMAGECATEGORY_DS_IMAGE_CATEGORY_REQUIRED', 'Descripción requerido', true);

//títulos de las actions
define('BOL_MSG_NEWSLETTER_TITLE', 'Boletín', true);
define('BOL_MSG_NEWSLETTER_TITLE_LIST', 'Listar Boletines', true);
define('BOL_MSG_NEWSLETTER_TITLE_ADD', 'Agregar Boletín', true);
define('BOL_MSG_NEWSLETTER_TITLE_UPDATE', 'Modificar Boletín', true);
define('BOL_MSG_NEWSLETTER_TITLE_VIEW', 'Ver Boletín', true);
define('BOL_MSG_NEWSLETTER_TITLE_XLS', 'Xls Boletín', true);
define('BOL_MSG_NEWSLETTER_TITLE_VIEW_ONLINE', 'Si no visualiza correctamente este E-Mail haga', true);
define('BOL_MSG_NEWSLETTER_TITLE_SENT', 'Enviar', true);
define('BOL_MSG_NEWSLETTER_SPEECH', 'Para incluir el Nombre del contacto din&aacute;micamente en el Bolet&iacute;n, tipee <em>{nombre_contacto}</em> y/o para la Empresa tipee <em>{nombre_empresa}</em>', true);
define('BOL_MSG_NEWSLETTER_OFERTAR', '�Quer�s ofertar o demandar un subproducto?', true);


define('BOL_MSG_NEWSLETTER_CD_NEWSLETTER_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_NEWSLETTER_CD_USER_REQUIRED', 'Usuario requerido', true);
define('BOL_MSG_NEWSLETTER_CD_TEMPLATE_REQUIRED', 'Plantilla requerido', true);
define('BOL_MSG_NEWSLETTER_DT_DATE_REQUIRED', 'Fecha requerido', true);
define('BOL_MSG_NEWSLETTER_DS_NEWSLETTER_REQUIRED', 'Título requerido', true);
define('BOL_MSG_NEWSLETTER_DS_TEXT_REQUIRED', 'Texto 1 requerido', true);
define('BOL_MSG_NEWSLETTER_DS_TEXT2_REQUIRED', 'Texto 2 requerido', true);
define('BOL_MSG_NEWSLETTER_DS_TEXT3_REQUIRED', 'Texto 3 requerido', true);
define('BOL_MSG_NEWSLETTER_DS_MAIL_REQUIRED', 'E-mail requerido', true);
define('BOL_MSG_NEWSLETTER_CD_STATUS_REQUIRED', 'Estado requerido', true);
define('BOL_MSG_NEWSLETTER_BL_TWITTER_REQUIRED', 'Twitter requerido', true);
define('BOL_MSG_NEWSLETTER_BL_FACEBOOK_REQUIRED', 'Facebook requerido', true);
define('BOL_MSG_NEWSLETTER_IMAGE_HEADER_REQUIRED', 'Cabecera requerido', true);
define('BOL_MSG_NEWSLETTER_IMAGE_FOOTER_REQUIRED', 'Pie requerido', true);


//títulos de las actions
define('BOL_MSG_NEWSLETTERIMAGE_TITLE_LIST', 'Listar Imágenes de Boletines', true);
define('BOL_MSG_NEWSLETTERIMAGE_TITLE_ADD', 'Cabecera y Pie', true);
define('BOL_MSG_NEWSLETTERIMAGE_TITLE_UPDATE', 'Modificar Imagen-Boletín', true);
define('BOL_MSG_NEWSLETTERIMAGE_TITLE_VIEW', 'Ver Imagen-Boletín', true);
define('BOL_MSG_NEWSLETTERIMAGE_TITLE_XLS', 'Xls Imagen-Boletín', true);

define('BOL_MSG_NEWSLETTERIMAGE_CD_NEWSLETTER_IMAGE_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_NEWSLETTERIMAGE_DS_NEWSLETTER_IMAGE_REQUIRED', 'Descripción requerido', true);
define('BOL_MSG_NEWSLETTERIMAGE_DS_PATH_REQUIRED', 'Path requerido', true);
define('BOL_MSG_NEWSLETTERIMAGE_CD_NEWSLETTER_REQUIRED', 'Boletín requerido', true);
define('BOL_MSG_NEWSLETTERIMAGE_NU_ORDER_REQUIRED', 'Orden requerido', true);

//títulos de las actions
define('BOL_MSG_SENDINGNEWSLETTER_TITLE_LIST', 'Listar Boletines Enviados', true);
define('BOL_MSG_SENDINGNEWSLETTER_TITLE', 'Envíos', true);
define('BOL_MSG_SENDINGNEWSLETTER_SAVE', 'Guardar Copia', true);
define('BOL_MSG_NEWSLETTERIMAGES_TITLE', 'Imgs', true);
define('BOL_MSG_SENDINGNEWSLETTER_TITLE_VIEW', 'Ver Boletín Enviado', true);
define('BOL_MSG_SENDINGNEWSLETTER_TITLE_XLS', 'Xls Boletín Enviado', true);



//títulos de las actions
define('BOL_MSG_STATUS_TITLE', 'Estado', true);
define('BOL_MSG_STATUS_TITLE_LIST', 'Listar Estados', true);
define('BOL_MSG_STATUS_TITLE_ADD', 'Agregar Estado', true);
define('BOL_MSG_STATUS_TITLE_UPDATE', 'Modificar Estado', true);
define('BOL_MSG_STATUS_TITLE_VIEW', 'Ver Estado', true);
define('BOL_MSG_STATUS_TITLE_XLS', 'Xls Estado', true);

define('BOL_MSG_STATUS_CD_STATUS_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_STATUS_DS_STATUS_REQUIRED', 'Descripción requerido', true);

//títulos de las actions
define('BOL_MSG_TEMPLATE_TITLE_LIST', 'Listar Plantillas', true);
define('BOL_MSG_TEMPLATE_TITLE_ADD', 'Agregar Plantilla', true);
define('BOL_MSG_TEMPLATE_TITLE_UPDATE', 'Modificar Plantilla', true);
define('BOL_MSG_TEMPLATE_TITLE_VIEW', 'Ver Plantilla', true);
define('BOL_MSG_TEMPLATE_TITLE_XLS', 'Xls Plantilla', true);

define('BOL_MSG_TEMPLATE_CD_TEMPLATE_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_TEMPLATE_DS_TEMPLATE_REQUIRED', 'Descripción requerido', true);
define('BOL_MSG_TEMPLATE_DS_PATH_REQUIRED', 'Path requerido', true);
define('BOL_MSG_TEMPLATE_NU_IMAGE_REQUIRED', 'Imágenes requerido', true);

define('BOL_MSG_CONTACT_DS_FILE_REQUIRED', 'Archivo requerido', true);

define('BOL_MSG_SUBSCRIPTION_SPEECH', 'copie el siguiente c&oacute;digo y p&eacute;guelo en su web', true);
define('BOL_MSG_SUBSCRIPTION_TITLE', 'Agregue un fomulario de suscripción al Newsletter en su web', true);
define('BOL_MSG_SUBSCRIPTION_TEXT_TITLE', 'Código', true);
define('BOL_MSG_SUBSCRIPTION_SUCCESSFUL', 'La Suscripción se ha realizados correctamente.<br><br>Muchas Gracias!', true);
define('BOL_MSG_SUBSCRIPTION_ALREADY', 'La Suscripción no pudo ser confirmada. La cuenta de Email ya se encontraba suscripta al<br>Newsletter con anterioridad. Si lo desea puede intentarlo con otra cuenta de correo de su<br> propiedad.<br><br>Muchas Gracias!', true);

define( "BOL_MSG_SUBSCRIPTION_EMAIL_SUBJECT",  'Suscripción a ', true );
define( "BOL_MSG_SUBSCRIPTION_EMAIL_WELCOME",  'Bienvenido! $2<br><br>Muchas gracias por su suscripción.', true );
define( "BOL_MSG_SUBSCRIPTION_NOT_SUBSCRIBED",  'Si Ud. no se ha suscripto y recibe por error este email, por favor haga click en el siguiente link para cancelar la suscripción.', true );
define( "BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE",  'Para desuscribirse de nuestra lista haga', true );
define( "BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE_MESSAGE",  'Presione en aceptar para desuscribirse del bolet&iacute;n', true );
define( "BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE_SUCCESSFUL",  'Desuscripci&oacute;n exitosa', true );

define( "BOL_MSG_ERROR_SENDING_EMAIL_SUBJECT",  'Error en envío', true );
define( "BOL_MSG_ERROR_SENDING_EMAIL_BODY",  'Ocurrió un error en el envío $1 del boletín $2', true );

//títulos de las actions
define('BOL_MSG_ITEM_TITLE_LIST', 'Items', true);
define('BOL_MSG_ITEM_TITLE_ADD', 'Agregar ítem', true);
define('BOL_MSG_ITEM_TITLE_UPDATE', 'Modificar ítem', true);
define('BOL_MSG_ITEM_TITLE_VIEW', 'Ver ítem', true);


define('BOL_MSG_ITEM_CD_ITEM_REQUIRED', 'Identificador requerido', true);
define('BOL_MSG_ITEM_DS_ITEM_REQUIRED', 'Descripción requerido', true);
define('BOL_MSG_ITEM_CD_NEWSLETTER_REQUIRED', 'Boletín requerido', true);
define('BOL_MSG_ITEM_NU_ORDER_REQUIRED', 'Orden requerido', true);

include ('messages_labels_es.php');

?>
