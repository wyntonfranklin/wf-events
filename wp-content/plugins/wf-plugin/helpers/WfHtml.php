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

	static function check_box(){
		return '<input id="checkBox" type="checkbox">';
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

	static function renderLayout($file_name, $variables = array(), $print = true) {
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

	static function beginForm( $method="post", $action="admin-post.php", $id=''){
		echo '<form method="'.$method.'" action="'.$action.'" id="'.$id.'">
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

	static function formMessage( $message='Done'){
		return '<div id="message" class="updated fade">
			<p><strong>'.$message.'</strong></p>
		</div>';
	}

	static function loggedIn(){
		return is_user_logged_in();
	}

	static function redirectAddress(){
		return (empty($_POST['_wf_http_referer']) ? site_url() : $_POST['_wp_http_referer']);
	}

	static function frontMessage(){
		return '<div style="margin:8px; border: 1px solid #ddd; background-color:#ff0"> Tank you for yours </div>';
	}

	static function getPageUrl( $page ){
		return menu_page_url($page,false);
	}

	static function adminUrl( $page, $params=array()){
		$queryParams = array_merge($params, array('page'=>$page));
		return add_query_arg($queryParams,
			admin_url('admin.php'));
	}

	static function registerScript($name, $path, $version){

	}

	static function registerStyle( $name, $path, $version){
		wp_enqueue_style($name,$path,array(),$version);
	}

	static function createPluginUrl(){
		
	}

}