<?php
/** op-skeleton-2020:/asset/app.php
 *
 * @created   2018-03-27
 * @version   1.0
 * @package   op-skeleton-2020
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-20
 */
namespace OP;

//	...
try {
	/** Include Application environment config.
	 *
	 * @created   2016-11-22   Creation config.php at app-skeleton.
	 * @updated   2017-??-??   Generate _config.php at app-skeleton2.
	 * @updated   2019-12-16   Rebirth by app-skeleton-2020.
	 * @moved     2019-12-27   app-skeleton-2020:/app.php --> asset/app.php
	 * @moved     2022-10-30   bootstrap.php | Initialize onepiece-framework application.
	 * @added     2022-10-30   rootpath.php  | Set meta root path file.
	 * @added     2022-12-17   check.php     | Check php module install and apache setting.
	 * @renamed   2023-01-01   app.php --> init.php
	 */
	foreach([
		'config/php',
		'config/op',
		'bootstrap',
		'rootpath',
		'config',
		'_config',
		'check',
	] as $file){
		//	Build full path.
		$file = __DIR__.'/'.$file.'.php';

		//	Include file into closure.
		if( file_exists($file) ){
			call_user_func(function($file){
				include($file);
			}, $file);
		}
	}

	//	...
	unset($file);

} catch ( \Throwable $e ){
	//	...
	if( function_exists('OP') ){
		Notice::Set($e);
	}else{
		echo $e->getMessage() . "<br/>\n";
		/* op-core is not loading.
		foreach( $e->getTrace() as $trace ){
			echo include(__DIR__.'/include/DebugBacktraceToString.php')."<br/>\n";
		}
		return;
		echo $trace; // For Eclipse notice.
		*/
		echo $e->getTraceAsString();
	}
	//	...
	require('bootstrap/op/failed.phtml');
}
