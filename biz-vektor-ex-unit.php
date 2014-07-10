<?php
/*
Plugin Name: BizVektor Expansion unit
Plugin URI: http://vektor-inc.co.jp
Description: 
Version: 0.0.0.0
Author: Vektor,Inc,
Author URI: http://vektor-inc.co.jp
License: GPL2
*/
/*
Copyright 2012 Hidekazu Ishikawa ( email : kurudrive@gmail.com )

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*-------------------------------------------*/
/*  ログインコードを管理画面で管理する
/*-------------------------------------------*/

/*-------------------------------------------*/
/*	Add Parent menu
/*-------------------------------------------*/
function ex_unit_setting_menu_parent() {
	global $menu;
	$parent_name = 'BizVektor設定';
	// Capability required　このメニューページを閲覧・使用するために最低限必要なユーザーレベルまたはユーザーの種類と権限。
	$Capability_required = 'activate_plugins';

	$custom_page = add_menu_page(
		$parent_name,			// Name of page
		$parent_name,			// Label in menu
		$Capability_required,
		'vk_setting_page',		// ユニークなこのサブメニューページの識別子
		'add_vk_setting_page'	// メニューページのコンテンツを出力する関数
	);
	if ( ! $custom_page ) return;
}
if (!function_exists('bizvektor_setting_menu_parent')) {
	add_action( 'admin_menu', 'ex_unit_setting_menu_parent' );
}
function add_vk_setting_page(){ ?>

<h2>BizVektor設定</h2>
<ul>
<li><a href="<?php echo admin_url();?>">SNS連携の設定</a></li>
</ul>
<?php 
}

/*-------------------------------------------*/
/*	Load sns module
/*-------------------------------------------*/
require dirname( __FILE__ ) . '/plugins/sns/sns.php';

/*-------------------------------------------*/
/*	Load google analytics module
/*-------------------------------------------*/
require dirname( __FILE__ ) . '/plugins/google_analytics/ga.php';

/*-------------------------------------------*/
/*	Add Parent menu
/*-------------------------------------------*/
// Add BizVektor EX unit css
add_action('wp_head','ex_unit_print_css');
function ex_unit_print_css(){

}

function ex_unit_get_capability_required(){
	$capability_required = 'activate_plugins';
	return $capability_required;
}