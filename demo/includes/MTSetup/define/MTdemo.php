<?php
	//==================================================================
	// Define main root id of your tree ( same in css and html div identifier !! )
	// Internal id
	//==================================================================
	$mt_demo = 'AR_1_';
	//==================================================================

	
	// Instance of tree
	$_SESSION[$ssid]['MT'][$mt_demo] = new itree(
						 $ssid,
						 $mt_demo,
						 __MAGICTREE_TABLE_SETUP__,
						 __MAGICTREE_TABLE_TEXT__,
						 __MAGICTREE_TABLE_LANGUAGE__,
						 __MAGICTREE_APPLICATION_RELEASE__
						 );

						 // Create a reference to the session

	// Build reference
	$obj_tree_demo = &$_SESSION[$ssid]['MT'][$mt_demo];

	//==================================================================
	// Define custom tree table to draw
	//==================================================================
	$obj_tree_demo->define_attribute('__node_table_name', 'mt_demo');
	$obj_tree_demo->define_attribute('__caption_table_name', 'mt_demo_caption');
	$obj_tree_demo->define_attribute('__extra_table_name', 'mt_demo_feature');
	//==================================================================

	//==================================================================
	// BBCode display node title
	//==================================================================
	$obj_tree_demo->define_attribute('__active_bbcode', true);
	//==================================================================

	//==================================================================
	// user and technical documentation ( No documentation in demo )
	//==================================================================
	$obj_tree_demo->define_attribute('__active_user_doc', false);
	$obj_tree_demo->define_attribute('__active_tech_doc', false);
	//==================================================================
	
	
	//==================================================================
	// Define language caption
	//==================================================================
	$obj_tree_demo->define_attribute('__language_id', 'ENG');
	//==================================================================

	//==================================================================
	// __automatic_flag_manage : true or false
	// false means you have to manage properly flag in tree
	// true means flag manage in tree
	//==================================================================
	$obj_tree_demo->define_attribute('__automatic_flag_manage', true);
	//==================================================================

	//==================================================================
	// Edit mode
	// true means you can change tree items
	// false means only display
	//==================================================================
	$obj_tree_demo->define_attribute('__active_edit', true);
	//==================================================================
	
	//==================================================================
	// Custom event function __on_click_item
	// Define name of customer javascript
	// 3 input parameters available
	// internal_id 	: Id of tree
	// row_id		: Id of clicked node
	// mode			: U means that tree is in update mode
	// Syntaxe to define your javascript custom function
	// function my_custom_function(node_id, row_id, mode ) {....}
	//==================================================================
	//$obj_tree_demo->define_attribute('__on_click_item', 'test_1');
	$obj_tree_demo->define_attribute('__on_click_item', null);			// No custom javascript function call on click item
	//==================================================================

	//==================================================================
	// Custom event function __on_new_item
	// Define name of customer javascript
	// internal_id 	: Id of tree
	// row_id		: Id of node created
	// Syntaxe to define your javascript custom function
	// function my_custom_function(node_id, row_id) {....}
	//==================================================================
	$obj_tree_demo->define_attribute('__on_new_item', 'custom_new_item_created');
	//$obj_tree_demo->define_attribute('__on_new_item', null);			// No custom javascript function call on new item added
	//==================================================================

	//==================================================================
	// Custom event function __on_delete_item
	// Define name of customer javascript
	// internal_id 	: Id of tree
	// row_id		: Id of node was deleted
	// Syntaxe to define your javascript custom function
	// function my_custom_function(node_id, row_id, total) {....}
	//==================================================================
	$obj_tree_demo->define_attribute('__on_delete_item', 'custom_deletion_item');
	//$obj_tree_demo->define_attribute('__on_delete_item', null);			// No custom javascript function call when item deleted
	//==================================================================
	
	//==================================================================
	// Tree theme to use
	// Have to be defined in theme/
	//==================================================================
	$obj_tree_demo->define_attribute('__theme', 'TreeView_default');
	//==================================================================
	
	
	//==================================================================
	// Input Id item to focus ( null means no focus )
	//==================================================================
	$obj_tree_demo->define_attribute('__focus_id', 2);
	//==================================================================
	
	//==================================================================
	// Enable or disable link to tickets list
	// true means ticket list is available by link
	//==================================================================
	$obj_tree_demo->define_attribute('__active_display_version', false);
	$obj_tree_demo->define_attribute('__active_ticket_link', false);
	//==================================================================

	//==================================================================
	// tab index prefixe : Mandatory for focus : Be larg to avoid issue
	//==================================================================
	$obj_tree_demo->define_attribute('__html_base_index_focus', 100);
	//==================================================================
		
	//==================================================================
	// Define input search caption
	//==================================================================
	$obj_tree_demo->define_attribute('__caption_search', '1 - Default Theme Mode 1');
	//==================================================================
	
	//==================================================================
	// Display or hide checkbox
	// true means display
	// false means hide
	//==================================================================
	$obj_tree_demo->define_attribute('__display_check_box', true);
	//==================================================================

	//==================================================================
	// Define list of items to check
	// Only visible if option __display_check_box is set to true
	// Only readed if mark_inside_tree = false
	//==================================================================
	//$obj_tree_demo->define_attribute('__list_checkbox_to_mark_id', Array("2" => true,"5" => true));
	$obj_tree_demo->define_attribute('__list_checkbox_to_mark_id', Array());
	//==================================================================

	//==================================================================
	// Define list of items to expand to root
	// if __active_expand_all is set to 1, all items are expanded
	//==================================================================
	$obj_tree_demo->define_attribute('__list_expand_root_id',$obj_tree_demo->read_attribute('__list_checkbox_to_mark_id'));
	//==================================================================

	//==================================================================
	// Expand all nodes
	// true means all nodes are expanded
	// false means all nodes are collapsed
	//==================================================================
	$obj_tree_demo->define_attribute('__active_expand_all', true);
	//==================================================================
	
	//error_log($obj_tree_demo->read_attribute('__node_table_name'));
	//error_log(print_r($obj_tree_demo->read_attribute('__list_expand_root_id'),true));
?>