<?php
/** op-skeleton-2020:/asset/rootpath.php
 *
 * @created   2022-10-30
 * @version   1.0
 * @package   op-skeleton-2020
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//	__DIR__ is real path. Not alias.
$asset_root = __DIR__.'/';

//  Branch per each SAPI.
switch( $sapi = php_sapi_name() ){
    //  Web Servers
	case 'cli-server': // PHP Built-in Server
		$_SERVER['APP_ROOT'] = $_SERVER['DOCUMENT_ROOT'];
		break;

    case 'fpm-fcgi':
    case 'apache2handler':
    case 'litespeed':
        //  App root.
        if( empty($_SERVER['APP_ROOT']) ){
            $_SERVER['APP_ROOT'] = dirname($_SERVER['SCRIPT_FILENAME']).'/';
        }
        break;

        //  CLI
    case 'cli':
        //  App root.
        if( empty($_SERVER['APP_ROOT']) ){
            //  Get current directory.
            $pwd = $_SERVER['PWD'];
            do{
                //  Find the directory where app.php file exists.
                if( file_exists( $pwd . '/app.php' ) ){
                    //  Found.
                    break;
                }
                //  Trim to upper directory.
                $pwd = dirname($pwd);
            }while( $pwd !== '/' );
            //  Assignment.
            $_SERVER['APP_ROOT'] = $pwd;
        }

        //  Document root.
        if( empty($_SERVER['DOCUMENT_ROOT']) ){
            $_SERVER['DOCUMENT_ROOT'] = $_SERVER['APP_ROOT'];
        }
        break;

    default:
        echo __FILE__ .' #'. __LINE__ . ' - ';
        exit("Undefined SAPI. ($sapi)");
}

//  App root
$app_root = $_SERVER['APP_ROOT'];

//	Document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

//  Git root
//	$app_root is alias path. Not real path.
/*
$git = include(__DIR__.'/unit/git/include/search_path.php');
$git_root = $git ? trim(`{$git} rev-parse --show-toplevel): '';
*/
if( file_exists("{$app_root}/.git") ){
    $git_root = $app_root;
}else if( file_exists(dirname($app_root).'/.git') ){
    $git_root = dirname($app_root);
}else{
    exit('Does not found .git directory.('.__FILE__.')');
}

//	Real path --> alias path
$real_root = realpath($git_root);
if( strpos($asset_root, $real_root) === 0 ){
	$asset_root = str_replace($real_root, $git_root, $asset_root);
}

//	Entry each root directory.
RootPath('git'      , $git_root                 );
RootPath('real'     , $real_root                );
RootPath('doc'      , $doc_root                 );
RootPath('app'      , $app_root                 );
RootPath('asset'    , $asset_root               );
RootPath('op'       , $asset_root.'core'        );
RootPath('core'     , $asset_root.'core'        );
RootPath('unit'     , $asset_root.'unit'        );
RootPath('layout'   , $asset_root.'layout'      );
RootPath('template' , $asset_root.'template'    );
