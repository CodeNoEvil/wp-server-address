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

// constants
define("TOP_NODE_ID", __FILE__ . "_Top_Node");
define("DATABASE_NODE_ID", __FILE__ . "_Database_Node");
define("DATABASE_GROUP_ID", __FILE__ . "_Database_Group");
define("DB_NAME_NODE_ID", __FILE__ . "_Database_Name_Node");
define("DB_USER_NODE_ID", __FILE__ . "_Database_User_Node");
define("DB_HOST_NODE_ID", __FILE__ . "_Database_Host_Node");


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
		        'id'	=> TOP_NODE_ID,
		        'title'	=> $_SERVER['SERVER_ADDR'],
		    ));
		    $admin_bar->add_node( array (
		    	'id'		=> DATABASE_NODE_ID,
		    	'title'		=> 'Database',
		    	'parent'	=> TOP_NODE_ID,
		    	)
		    );
		    $admin_bar->add_group( array(
		    	'id'		=> DATABASE_GROUP_ID,
		    	'parent'	=> DATABASE_NODE_ID,
		    	) 
		    );
		    $admin_bar->add_node( array (
		    	'id'		=> DB_NAME_NODE_ID,
		    	'title'		=> 'Name: ' . DB_NAME,
		    	'parent'	=> DATABASE_GROUP_ID,
		    	)
		    );
		    $admin_bar->add_node( array (
		    	'id'		=> DB_USER_NODE_ID,
		    	'title'		=> 'User: ' . DB_USER,
		    	'parent'	=> DATABASE_GROUP_ID,
		    	)
		    );
		    $admin_bar->add_node( array (
		    	'id'		=> DB_HOST_NODE_ID,
		    	'title'		=> 'Host: ' . DB_HOST,
		    	'parent'	=> DATABASE_GROUP_ID,
		    	)
		    );
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



























