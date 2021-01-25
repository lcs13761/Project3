<?php


/**
 * DATA BASE
 */

define("CONF_DB_HOST" , "127.0.0.1");
define("CONF_DB_USERNAME", "root");
define("CONF_DB_PASSWORD", "0131");
define("CONF_DB_NAME", "dbweb");


/**
 * URL
 */

define("CONF_URL_BASE","http://www.Hiello.com.br");
define("CONF_URL_TEST" , "http://www.localhost/Project3");


/**
 * View
 */
define("CONF_VIEW_PATH" , "/../../shared/view");
define("CONF_VIEW_EXT", "php");

/**
 * Support
 */

define("CONF_MAIL_SUPPORT", "lcs13761@hotmail.com");


/**Uploads */
define("CONF_UPLOAD_DIR","themes/assets");
define("CONF_UPLOAD_IMAGE_DIR","images");
/**Imagem */
define("CONF_IMAGEM_UP",CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR);
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);