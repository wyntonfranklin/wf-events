<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 4/29/2018
 * Time: 7:34 PM
 */

class WfHtml {

	function __construct() {

	}


	static function text_input(){
		return '<input>';
	}

	static function renderFileTest( $file_name ){
		$o = '';
		try{
			$o = file_get_contents(plugin_dir_path(__DIR__) . 'layouts/'. $file_name .'.php');
		}catch (Exception $e){

		}
		return $o;
	}

	static function render($file_name, $variables = array(), $print = true) {
		$filePath = plugin_dir_path(__DIR__) . 'layouts/'. $file_name .'.php';
		return self::renderFile($filePath, $variables, $print);
	}

	static function renderView($file_name, $variables = array(), $print = true){
		$filePath = plugin_dir_path(__DIR__) . 'view/'. $file_name .'.php';
		return self::renderFile($filePath, $variables, $print);
	}

	static function renderFile($filePath, $variables, $print){
		$output = NULL;
		if(file_exists($filePath)){
			extract($variables);
			ob_start();
			include $filePath;
			$output = ob_get_clean();
		}
		if ( $print ) {
			echo $output;
		}else{
			return $output;
		}
		return false;
	}

}