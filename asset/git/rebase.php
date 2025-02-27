<?php
/** op-skeleton-2020:/asset/git/rebase.php
 *
 * <pre>
 * ```sh
 * php git.php asset/git/rebase.php remote=origin branch=master display=1 debug=0
 * ```
 * </pre>
 *
 * @created    2023-02-15
 * @version    1.0
 * @package    op-skeleton-2020
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
namespace OP;

//  ...
if(!function_exists('OP') ){
    echo "Usage: php git.php asset/git/rebase.php remote=origin branch=2022 display=1 debug=1\n";
    exit(__LINE__);
}

//	...
$exit    = 0;
$display = OP::Request('display') ?? 1;
$remote  = OP::Request('remote')  ?? 'origin';
$branch  = OP::Request('branch')  ?? _OP_APP_BRANCH_;

/* @var $git UNIT\Git */
$git = OP::Unit('Git');

//	Do main repository.
$git->Stash()->Save();
$git->Rebase($remote, $branch);
$git->Stash()->Pop();

//	...
$configs = $git->SubmoduleConfig();

//	Submodules
foreach( $configs as $config ){
	//	...
	$meta = 'git:/'.$config['path'];
	$path = OP::MetaPath($meta);
	if(!chdir($path) ){
		throw new \Exception("chdir was failed. ({$meta}, {$path})");
	}
	if( $display ){ D("Change Directory: {$meta}"); }

	//	...
	if(!$git->Status() ){
		D("Working tree is not clean. ($meta)");
		$exit = __LINE__;
		continue;
	}

	//	...
	$branch = $config['branch'] ?? $git->Branch()->Main();
	$follow = $config['follow'] ?? '';

	//	...
	$git->Rebase($remote, $branch);
	if( $follow ){ $git->Rebase($remote, $follow); }
}

//	Git root.
$meta = 'git:/';
$path = OP::MetaPath($meta);
if(!chdir($path) ){
	throw new \Exception("chdir was failed. ({$meta}, {$path})");
}
if( $display ){ D("Change Directory: {$path}"); }

//	...
exit($exit);
