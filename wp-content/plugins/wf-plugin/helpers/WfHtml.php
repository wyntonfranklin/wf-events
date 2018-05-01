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


	static function text_input($attribute, $value, $htmlOptions=array()){
		return '<input type="text" name="'.$attribute.'" value="'.$value.'">';
	}

	static function submitButton(){
		return '<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>';
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

	static function adminPageRedirect($type , $page, $admin_page, $msg=true){
		if( $msg ){
			wp_redirect(add_query_arg(array('page'=>$page,'message'=>1),admin_url($admin_page)));
		}else{
			wp_redirect(add_query_arg($type,$page,admin_url($admin_page)));
		}
	}

	static function beginForm(){
		echo '<form method="post" action="admin-post.php">
			<input type="hidden" name="action" value="save_wf_events_options">';
	}

	static function endForm(){
		echo '</form>';
	}

	static function beginFormTable(){
		echo '	<table class="form-table">
		<tbody>';
	}

	static function endFromTable(){
		echo '</tbody>
			</table>';
	}

}