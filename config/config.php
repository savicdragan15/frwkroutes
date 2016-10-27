<?php

error_reporting(-1);
include_once "config_poruke.php";
include_once "config_db.php";
include_once "config_module.php";

define("_DEFAULT_CONTROLLER", "home");

define('_WEB_PATH',"http://".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));

define("_NEW_PRODUCT_HOME_PAGE",4);

define("_VIEWS_FOLDER", "views");
define("_FOLDER_CLASSES", "classes");

define("_VIEWS_PATH", $_SERVER['DOCUMENT_ROOT']."/all_shine_out/"._VIEWS_FOLDER);
define("_CACHE_FOLDER", $_SERVER['DOCUMENT_ROOT']."/all_shine_out/views/cache/");


/**************************** Shipping prices /******************************************/

define("_POST", 5);
define("_DHL", 6);
define("_SELF_PICK_UP", 0);

/**************************** VAT ******************************************************/
define("_VAT", 0.2);
/**************************Payment**********************************************************/
define("_userID", "STUZZATWXXX_109197"); // Eps "Händler-ID"/UserID = epsp:UserId
define("_pin", "D745FAD8B5BCA79F");      // Secret for authentication / PIN = part of epsp:MD5Fingerprint
define("_bic", "STZZATWWXXX");    // BIC code of receiving bank account = epi:BfiBicIdentifier
define("_iban", "AT748900000001100075");// IBAN code of receiving bank account = epi:BeneficiaryAccountIdentifier
define("_targetUrl", "https://routing.eps.or.at/appl/epsSO-test/transinit/eps/v2_5");

/********************************** Redirect Url-s *************************************/
define("_confirmUrl", "http://www.php-paspartu.com/all_out_shine/test/confirm");
define("_successUrl", "http://www.php-paspartu.com/all_out_shine/test/thanks/1");
define("_errorUrl", "http://www.php-paspartu.com/all_out_shine/test/thanks/2");

//Production parameters Eps
// Connection credentials. Override them for test mode. 
        /*$userID = 'RLNWATWWXXX_194892';            // Eps "Händler-ID"/UserID = epsp:UserId
        $pin    = '060CE533BF34484A';              // Secret for authentication / PIN = part of epsp:MD5Fingerprint
        $bic    = 'RLNWATWW';            // BIC code of receiving bank account = epi:BfiBicIdentifier
        $iban   = 'AT133200000112375028';   // IBAN code of receiving bank account = epi:BeneficiaryAccountIdentifier
        $targetUrl = 'https://routing.eps.or.at/appl/epsSO-test/transinit/eps/v2_5'; // Target URL to send TransferInitiatorDetails to. 'null' means: Use default URL. For test mode, insert: https://routing.eps.or.at/appl/epsSO-test/transinit/eps/v2_5
*/