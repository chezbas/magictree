<?php
	/**==================================================================
	 * MagicTree configuration
	 ====================================================================*/
	$path_root_framework = './';	// MagicTree and this file in the same level
	require('../includes/MTSetup/setup.php');
	/*===================================================================*/		

	
	/**==================================================================
	 * MagicTree framework include
	 ====================================================================*/	
	$path_root_magictree = './';
	require('./page_includes.php');
	/*===================================================================*/	
	
	
	/**==================================================================
	 * Page buffering ( !! No output ( echo, print_r etc..) before this include !! )
	 ====================================================================*/
	require('./includes/common/buffering.php');
	/*===================================================================*/	

	
	/**==================================================================
	* Load global functions
	====================================================================*/	
	require('./includes/common/global_functions.php');
	/*===================================================================*/
	
	
	/**==================================================================
	 * Get/Set ssid window identifier
	 * Start unique php session with ssid name
	 ====================================================================*/
	require('./includes/common/ssid_session_start.php');
	/*===================================================================*/	
	
	
	/**==================================================================
	 * Lisha configuration
	 ====================================================================*/
	require('./includes/common/load_conf_session.php');
	/*===================================================================*/
	
	
	/**==================================================================
	* Recover language from URL or Database
	====================================================================*/	
	require('./includes/common/language.php');
	/*===================================================================*/
	

	/**==================================================================
	 * Setup page timeout
	 ====================================================================*/	
	require('./includes/common/page_timeout.php');
	/*===================================================================*/	
	
	
	/**==================================================================
	 * HTML declare page interpretation directive
	 ====================================================================*/	
	require('./includes/common/html_doctype.php');
	/*===================================================================*/
?>