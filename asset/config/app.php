<?php
/**	op-skeleton-2020:/asset/config/app.php
 *
 * @created   2019-02-20
 * @version   1.0
 * @package   op-skeleton-2020
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

/**	Return config array.
 *
 * @created   2019-12-12
 * @return    array        $config
 */
return [
	'title'     => 'The onepiece-framework app skeleton '._OP_APP_BRANCH_,
	'copyright' => 'Copyright 2009 All right reserved.',
	'app.phtml' =>  Env::isAdmin() ? true: false,
];
