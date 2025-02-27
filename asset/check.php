<?php
/** op-skeleton-2020:/asset/check.php
 *
 * @created   2022-12-17
 * @version   1.0
 * @package   op-skeleton-2020
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	Checking Shell.
if( Env::isShell() ){
	return;
}

//	...
foreach([
	'mbstring' => 'mb_language',
	'openssl'  => 'openssl_encrypt',
	'apcu'     => 'apcu_add',
] as $module => $function){
	//	...
	if( function_exists($function) ){
		continue;
	}

	//	...
	define('_OP_APP_BOOTSTRAP_', $module);
	require(__DIR__.'/bootstrap/php/module.php');
	exit(__LINE__);
}

/*
//	Check mbstring installed.
if(!function_exists('mb_language') ){
	define('_OP_APP_BOOTSTRAP_', 'mbstring');
	require(__DIR__.'/bootstrap/php/module.php');
	exit(__LINE__);
}

//	Check openssl installed.
if(!defined('OPENSSL_VERSION_NUMBER') ){
	define('_OP_APP_BOOTSTRAP_', 'openssl');
	require(__DIR__.'/bootstrap/php/module.php');
	exit(__LINE__);
};
*/

//	Checking Shell.
if( Env::isShell() ){
	return;
}

/*
//	Checking rewrite setting.
if( 'app.php' !== basename($_SERVER['SCRIPT_FILENAME']) ){
	//	Has not been setting rewrite.
	require(__DIR__.'/bootstrap/op/rewrite.php');
	exit(__LINE__);
}
*/

//	...
$webserver = strtolower($_SERVER['SERVER_SOFTWARE'] ?? '');
foreach( ['php','apache','nginx'] as $key ){
	if( strpos($webserver, $key) === 0 ){
		$webserver = $key;
		break;
	}
}

//	Branch to each server software.
switch( $webserver ){
	case 'php':
		break;

	case 'apache':
	case 'nginx':
	case 'litespeed':
		//	Checking rewrite setting.
        switch( $entry_point = basename($_SERVER['SCRIPT_FILENAME']) ){
            case 'app.php':
            case 'dev.php':
                break;
            default:
                //	Has not been setting rewrite.
                require(__DIR__.'/bootstrap/op/rewrite.php');
                echo "Entry point is {$entry_point}";
                exit(__LINE__);
        }
		break;

    default:
        echo "This webserver is not supported. ($webserver)\n";
        exit(__LINE__);
}
