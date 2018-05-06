<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/6/2018
 * Time: 11:44 AM
 */

class WfPager {

	static function pagination_links( $tableData ){
		$o = '';
		$o .= self::startPager();
		$o .= self::showTableSummary( $tableData['total']);
		$o .= self::startLinks();
		$o .= self::backward_link();
		$o .= self::back_link();
		$o .= self::current_page();
		$o .= self::table_summary( $tableData );
		$o .= self::next_link();
		$o .= self::forward_link();
		$o .= '</span></div>';
		return $o;
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

	private static function back_link(){
		return '<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>';
	}

	private static function current_page(){
		return '<span class="screen-reader-text">Current Page</span>';
	}

	private static function table_summary( $data ){
		$o = '<span id="table-paging" class="paging-input">';
		$o .= '<span class="tablenav-paging-text">1 of <span class="total-pages">';
		$o .=  self::getCeil( $data );
		$o .= '</span></span></span>';
		return $o;
	}

	private static function next_link(){
		$currentUrl = add_query_arg(array('paged'=>''));
		return '<a class="next-page" href="'.$currentUrl.'">
                    <span class="screen-reader-text">Next page</span>
                    <span aria-hidden="true">›</span>
                </a>';
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