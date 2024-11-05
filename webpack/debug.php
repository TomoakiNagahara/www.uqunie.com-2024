<?php
/**	op-skeleton-2024:/webpack/index.php
 *
 * @created   2024-08-16
 * @version   1.0
 * @package   op-skeleton-2024
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**	Declare strict
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

//	...
$debug = [];

//	...
$debug['js']['hash']  = OP()->Unit('WebPack')->Hash('js');
$debug['css']['hash'] = OP()->Unit('WebPack')->Hash('css');
D($debug);

//	...
OP()->WebPack()->Auto('debug.js');
OP()->WebPack()->Auto('debug.css');

//	...
$debug['js']['hash']  = OP()->Unit('WebPack')->Hash('js');
$debug['css']['hash'] = OP()->Unit('WebPack')->Hash('css');
D($debug);

//	...
OP()->WebPack()->Auto();
