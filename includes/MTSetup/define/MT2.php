<?php
	//==================================================================
	// Define main root id of your tree ( same in css and html div identifier !! )
	// Internal id
	//==================================================================
	$mt2_id = 'AR_2_';
	//==================================================================

	
	// Instance of tree
	$_SESSION[$ssid]['MT'][$mt2_id] = new itree(
						 $ssid,
						 $mt2_id,
						 __MAGICTREE_TABLE_SETUP__,
						 __MAGICTREE_TABLE_TEXT__,
						 __MAGICTREE_TABLE_LANGUAGE__,
						 __MAGICTREE_APPLICATION_RELEASE__
						 );

						 // Create a reference to the session

	// Build reference
	$obj_tree_demo2 = &$_SESSION[$ssid]['MT'][$mt2_id];

	//==================================================================
	// Define language caption
	//==================================================================
	$obj_tree_demo2->define_attribute('__language_id', 'FRA');
	//==================================================================

	//==================================================================
	// __automatic_flag_manage : true or false
	// false means you have to manage properly flag in tree
	// true means flag manage in tree
	//==================================================================
	$obj_tree_demo2->define_attribute('__automatic_flag_manage', true);
	//==================================================================

	//==================================================================
	// Define custom tree table to draw
	//==================================================================
	//$obj_tree_demo2->define_attribute('__node_table_name', 'mt_tree');
	$obj_tree_demo2->define_attribute('__caption_table_name', 'mt_caption');
	$obj_tree_demo2->define_attribute('__extra_table_name', 'mt_feature');
	//==================================================================

	//==================================================================
	// BBCode display node title
	//==================================================================
	$obj_tree_demo2->define_attribute('__active_bbcode', false);
	//==================================================================
	
	//==================================================================
	// user and technical documentation
	//==================================================================
	$obj_tree_demo2->define_attribute('__active_user_doc', false);
	$obj_tree_demo2->define_attribute('__active_tech_doc', false);
	//==================================================================
	
	//==================================================================
	// Edit mode
	// true means you can change tree items
	// false means only display
	//==================================================================
	$obj_tree_demo2->define_attribute('__active_edit', false);
	//==================================================================
	
	//==================================================================
	// Custom event function OnCickItem
	// Define name of customer javascript
	// 3 input parameters available
	// internal_id 	: Id of tree
	// row_id		: Id of clicked node
	// mode			: U means that tree is in update mode
	// Syntaxe to define your javascript custom function
	// function my_custom_function(node_id, row_id, mode ) {....}
	//==================================================================
	//$obj_tree_demo2->define_attribute('__on_click_item', 'test');
	//$obj_tree_demo2->define_attribute('__on_click_item', null);			// No custom javascript function call on click item
	//==================================================================

	//==================================================================
	// Tree theme to use
	// Have to be defined in theme/
	//==================================================================
	$obj_tree_demo2->define_attribute('__theme', 'TreeView_dev');
	//==================================================================
	
	
	//==================================================================
	// Input Id item to focus ( null means no focus )
	//==================================================================
	//$obj_tree_demo2->define_attribute('__focus_id', 2);
	//==================================================================
	
	//==================================================================
	// Enable or disable link to tickets list
	// Enable or disable magictree version
	// true means ticket list is available by link
	//==================================================================
	$obj_tree_demo2->define_attribute('__active_ticket_link', false);
	$obj_tree_demo2->define_attribute('__active_display_version', false);
	//==================================================================

	//==================================================================
	// tab index prefixe : Mandatory for focus : Be larg to avoid issue
	//==================================================================
	$obj_tree_demo2->define_attribute('__html_base_index_focus', 200);
	//==================================================================
		
	//==================================================================
	// Define input search caption
	//==================================================================
	$obj_tree_demo2->define_attribute('__caption_search', '2 - Display tree not root language');
	//==================================================================
	
	//==================================================================
	// Display or hide checkbox
	// true means display
	// false means hide
	//==================================================================
	$obj_tree_demo2->define_attribute('__display_check_box', false);
	//==================================================================

	//==================================================================
	// Define list of items to check
	// Only visible if option __display_check_box is set to true
	// Only readed if mark_inside_tree = false
	//==================================================================
	//$obj_tree_demo2->define_attribute('__list_checkbox_to_mark_id', Array("2" => true,"5" => true));
	$obj_tree_demo2->define_attribute('__list_checkbox_to_mark_id', Array());
	//==================================================================

	//==================================================================
	// Define list of items to expand to root
	// if __active_expand_all is set to 1, all items are expanded
	//==================================================================
	$obj_tree_demo2->define_attribute('__list_expand_root_id',$obj_tree_demo2->read_attribute('__list_checkbox_to_mark_id'));
	//==================================================================

	//==================================================================
	// Expand all nodes
	// true means all nodes are expanded
	// false means all nodes are collapsed
	//==================================================================
	$obj_tree_demo2->define_attribute('__active_expand_all',true);
	//==================================================================
?>