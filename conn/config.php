<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/23/14
 * Time: 11:58 AM
 */

// Configuration for Database connection

define("DB_host","localhost");
define("DB_user","root");
define("DB_pass","");
define("DB_name","acta_pro");


//Configuration for cookies
//Cookies_security_key = put random valu for mor secure. if changed, all cookies are reset.

define("cookie_runtime",604800);
define("cookie_domain","localhost");
define("cookie_security_key","1gp@TMPS{+$78sfpMJFe-92s");



//Configuration for hash strength
// this constant will be used in login class.

define("hash_cost_factor","10");