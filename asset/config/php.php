<?php
/** op-skeleton-2020:/asset/config/php.php
 *
 * @created   2022-11-09
 * @version   1.0
 * @package   op-skeleton-2020
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**	Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//	PHP Setting
error_reporting(E_ALL);
ini_set('short_open_tag','On' );
ini_set('display_errors','On' );
ini_set('log_errors'    ,'Off');

//	Timezone
date_default_timezone_set('Asia/Tokyo');

//	Overwrite
if( file_exists( $path = __DIR__.'/_php.php' ) ){
	require_once($path);
}

//	...
return [];
