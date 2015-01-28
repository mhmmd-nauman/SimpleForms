<?php 
ob_start();
@session_start();
error_reporting(5);
$parts		=	explode("/",$_SERVER['PHP_SELF']);
$page		=	$parts[count($parts) - 1];
$project	= 	"/junk/webform";  /** place the diretory path where you copied the files here **/
$url		=	str_replace("//","/",$_SERVER['HTTP_HOST'].$project."/");
define('HTTP_SITE', 'http://'.$url); /* "http://www.yoursite.com/" */
define('HOST', $_SERVER['HTTP_HOST']); /* "www.yoursite.com" */
define('PAGE', $page); /* "yoursite.com" */
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].$project.'/');
mysql_connect("localhost"," "," "); /** place db username and password here **/
mysql_select_db(" "); /** place db name here **/
define("date_format","m/d/Y");
define("currency_format","$");
?>