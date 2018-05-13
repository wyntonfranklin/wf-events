<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/6/2018
 * Time: 11:44 AM
 */

class WfPager {

	private $limit = 0;
	private $count = 0;
	private $page = 0;

	function __construct() {

	}

	static function pagination_links( $tableData ){
		$limit = $tableData['limit'];
		$count = $tableData['total'];
		$page = $tableData['page'];
		$currentUrl =  self::getCurrentUrl( $page );
		$nextUrl =  self::getNextUrl( $page );
		$prevUrl = self::getPreviousUrl( $page );
		$o = '';
		$o .= self::startPager();
		$o .= self::showTableSummary( $tableData['total']);
		$o .= self::startLinks();
		$o .= self::backward_link();
		$o .= self::back_link( $prevUrl );
		$o .= self::current_page();
		$o .= self::table_summary( $tableData );
		$o .= self::next_link($nextUrl);
		$o .= self::forward_link();
		$o .= '</span></div>';
		return $o;
	}

	static function getMinUrl(){

	}

	static function getMaxUrl(){

	}

	static function getCurrentUrl( $page ){
		if(isset($page)){
			return add_query_arg(array('paged'=>$page));
		}else{
			return  add_query_arg(array());
		}
	}

	static function getNextUrl( $page ){
		if(isset($page)){
			$page = $page+1;
			return add_query_arg(array('paged'=>$page));
		}else{
			$page =1;
			return  add_query_arg(array('paged'=>$page));
		}
	}

	static function getPreviousUrl( $page ){
		if(isset($page)){
			$page = $page-1;
			if( $page==0 ){
				return null;
			}else{
				return add_query_arg(array('paged'=>$page));
			}
		}else{
			$page =1;
			return  add_query_arg(array('paged'=>$page));
		}
	}

	static function loadAttributes(){

	}

	private static function startPager(){
		return ' <div class="tablenav-pages">';
	}

	private static function showTableSummary( $count ){
		return '<span class="displaying-num">'.$count.' items</span>';
	}

	private static function startLinks(){
		return '<span class="pagination-links">';
	}

	private static function backward_link(){
		return '<span class="tablenav-pages-navspan" aria-hidden="true">«</span>';
	}

	private static function back_link( $url ){
		if( isset( $url ) ){
			return '<a class="prev-page" href="'.$url.'"><span class="tablenav-pages-navspan" aria-hidden="true">‹</span></a>';
		}else{
			return '<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>';
		}
	}

	private static function current_page(){
		return '<span class="screen-reader-text">Current Page</span>';
	}

	private static function table_summary( $data ){
		$page = $data['page'];
		if( empty($page)){
			$page = 1;
		}
		$o = '<span id="table-paging" class="paging-input">';
		$o .= '<span class="tablenav-paging-text">'.$page.' of <span class="total-pages">';
		$o .=  self::getCeil( $data );
		$o .= '</span></span></span>';
		return $o;
	}

	private static function next_link( $url ){
		if( isset($url)){
			return '<a class="next-page" href="'.$url.'">
                    <span class="screen-reader-text">Next page</span>
                    <span aria-hidden="true">›</span>
                </a>';
		}else{
			return '<span class="screen-reader-text">Next page</span>
                    <span aria-hidden="true">›</span>';
		}
	}

	private static function forward_link(){
		return ' <a href="#">
 				<span class="tablenav-pages-navspan" aria-hidden="true">»</span>
			</a>';
	}

	private static function getCeil( $data ){
		return ceil($data['total']/$data['limit']);
	}



}