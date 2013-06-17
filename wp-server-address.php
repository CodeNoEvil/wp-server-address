<?php
/*
Plugin Name: WP Server Address
Plugin URI: http://www.codenoevil.com/wp/wp-server-address
Description: Displays server IP address in Admin Bar
Version: 1.0
Author: David B. Bitton
Author URI: http://www.codenoevil.com
License: MIT
*/
/*
The MIT License (MIT)

Copyright (c) 2013 Code No Evil, LLC

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

if(!class_exists('WP_Server_Address')) {
  class WP_Server_Address {
		public function __construct() {
			add_action('admin_bar_menu', array(&$this, 'add_toolbar_items'), 100);
		}

		public static function activate() {

		}

		public static function deactivate() {

		}

		function add_toolbar_items($admin_bar){
		    $admin_bar->add_node( array(
		        'id'    => 'SERVER_ADDR',
		        'title' => $_SERVER['SERVER_ADDR'],
		    ));
	    	}
	}
}

if(class_exists('WP_Server_Address')) {

	// hooks
	register_activation_hook(__FILE__, array('WP_Server_Address', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Server_Address', 'deactivate'));

	// instantiate class
	$wp_server_address = new WP_Server_Address();

	if (isset($wp_server_address)) {

	}
}
