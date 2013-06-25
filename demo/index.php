<?php
	/**==================================================================
	 * MagicTree configuration
	 ====================================================================*/
	$path_root_framework = '../';	// MagicTree framework is parent
	require('../includes/MTSetup/setup.php');
	/*===================================================================*/		

	
	/**==================================================================
	 * MagicTree framework include
	 ====================================================================*/	
	require($path_root_magictree.'/page_includes.php');
	/*===================================================================*/	
	
	
	/**==================================================================
	 * Get/Set ssid window identifier
	 * Start unique php session with ssid name
	 ====================================================================*/
	require('./includes/common/ssid_session_start.php');
	/*===================================================================*/	
	
	
	/**==================================================================
	 * Page buffering ( !! No output ( echo, print_r etc..) before this include !! )
	 ====================================================================*/
	require('./includes/common/buffering.php');
	/*===================================================================*/	

	
	/**==================================================================
	 * Page database connexion
	 * Load configuration parameters in session
	 ====================================================================*/	
	require('./includes/common/load_conf_session.php');
	/*===================================================================*/	
	
	
	/**==================================================================
	 * Recover language from URL or Database
	 ====================================================================*/	
	require('./includes/common/language.php');
	/*===================================================================*/	

	
	/**==================================================================
	 * Setup page max timeout
	 ====================================================================*/	
	require('./includes/common/page_timeout.php');
	/*===================================================================*/	
		
	
	/**==================================================================
	 * HTML declare page interpretation directive
	 ====================================================================*/	
	require('./includes/common/html_doctype.php');
	/*===================================================================*/	
?>
<html>
	<head>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">	

		<script type="text/javascript">
			var ssid = '<?php echo $ssid; ?>';
		</script>
		<?php				
			//==================================================================
			// Common tree HTML header generation
			//==================================================================
			itree::generate_common_html_header(	$link,
												$ssid,
												__MAGICTREE_TABLE_TEXT__,
												__MAGICTREE_TABLE_SETUP__,
												__MAGICTREE_APPLICATION_RELEASE__,
												$_SESSION[$ssid]['MT']['langue'],
												$path_root_framework
												);
			//==================================================================
		
			/**==================================================================
			 * MagicTree definition of each tree in page
			 ====================================================================*/	
			include ('./includes/MTSetup/define/MTdemo.php');
			$_SESSION[$ssid]['MT'][$mt_demo]->generate_html_header();
			/*===================================================================*/
		?>
		<link rel="stylesheet" href="css/index.css" type="text/css"> <!-- * load custom page style * -->
		<script  type="text/javascript" src="js/index.js"></script> <!-- load custom javascript page -->
	<title>MagicTree DEMO</title>
	</head>
	<body onload="<?php 
						echo 'MagicTree_'.$mt_demo.'();';
				?>custom_new_item_created('AR_1_', 1);">
	<div id="stats" style='position: absolute; top:0; left:0; width:100%; height:20px; font-size=0.8em; display:block; z-index:20;'>Total nodes : <span id="total_nodes">...</span></div>
	<div id="test" style='display:block;'>
	<?php echo '<div id="'.$mt_demo.'" style="position: absolute; top:20px; left:0; height:95%; width:100%; font-size: 1em;"></div>'?>
	</div>
	</body>
</html>