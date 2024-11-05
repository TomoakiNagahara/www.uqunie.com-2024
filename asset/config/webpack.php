<?php
/** op-skeleton-2024:/webpack.php
 *
 * @created    2024-01-23
 * @copied     2024-11-05  op-unit-webpack --> op-skeleton-2024
 * @version    2.0
 * @package    op-skeleton-2024
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP\UNIT\WEBPACK;

//	In case of JavaScript.
$js = [
	'debug' =>  false,	 // for debug flag
	'cache' =>  true,	 // file, apcu, memcache
	'minify'=>  true,	 // File compression. Remove space character and comment.
];

//	In case of style sheet.
$css = [
	'debug' =>  false,	 // for debug flag
	'cache' =>  true,	 // file, apcu, memcache
	'minify'=>  true,	 // File compression. Remove space character and comment.
];

//	In case of is Admin.
$admin = [
	'debug' => true,
	'cache' => true,
	'minify'=> true,
];

//	...
$config = [
	'js'    => $js,
	'css'   => $css,
	'admin' => $admin,
];

//	...
return $config;
