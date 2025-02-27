<?php
/**	op-skeleton-2020:/asset/git/branch.php
 *
 * Switch to default branch by .gitmodules file.
 *
 * <pre>
 * ```sh
 * php git.php asset/git/branch.php
 * ```
 * </pre>
 *
 * @created    2023-11-30
 * @version    1.0
 * @package    op-skeleton-2020
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
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
if(!function_exists('OP') ){
	echo "Usage: php git.php asset/git/branch.php\n";
	exit(__LINE__);
}

/* @var $git UNIT\Git */
$git      = OP::Unit('Git');
$git_root = RootPath('git');

//	...
$configs = $git->SubmoduleConfig();

//	...
foreach( $configs as $config ){
	//	...
	$path   = $config['path'];
	$branch = $config['branch'] ?? _OP_APP_BRANCH_;

	//	...
	chdir($git_root.$path);

	//	...
	$git->Switch($branch);
}
