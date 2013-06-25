<?php
	/**==================================================================
	 * MagicTree configuration
	 ====================================================================*/
	$path_root_framework = './';	// MagicTree and this file in the same level
	require('./includes/MTSetup/setup.php');
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
	 * Load global functions
	 ====================================================================*/	
	require('./includes/common/global_functions.php');
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
	
	
	// Page language equal magic tree language
	$_SESSION[$ssid]['langue'] = $_SESSION[$ssid]['MT']['langue']
?>
<html>
	<head>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">	

		<script type="text/javascript">
			var ssid = '<?php echo $ssid; ?>';
			<?php 
					/**==================================================================
					 * Load custom page text in both php session and javascript
					 * Warning : Must be in <head> html bloc 
					 ====================================================================*/	
					$text_group = 'home';
					require('./includes/common/textes.php');
					echo chr(10);
					/*===================================================================*/
				?>
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
			include ('includes/MTSetup/define/MT1.php');
			$_SESSION[$ssid]['MT'][$mt1_id]->generate_html_header();

			include ('includes/MTSetup/define/MT2.php');
			$_SESSION[$ssid]['MT'][$mt2_id]->generate_html_header();

			include ('includes/MTSetup/define/MT3.php');
			$_SESSION[$ssid]['MT'][$mt3_id]->generate_html_header();

			include ('includes/MTSetup/define/MT4.php');
			$_SESSION[$ssid]['MT'][$mt4_id]->generate_html_header();
			/*===================================================================*/
		?>
		<link rel="stylesheet" href="css/index.css" type="text/css"> <!-- * load custom page style * -->
		<script  type="text/javascript" src="js/index.js"></script> <!-- load custom javascript page -->
	
	<link rel="shortcut icon" type="image/png" href="favicon.ico">

	<title><?php echo mysql_protect($_SESSION[$ssid]['page_text'][1]['LT'])?></title>
	</head>
	<body onload="<?php 
						echo 'MagicTree_'.$mt1_id.'();';
						echo 'MagicTree_'.$mt2_id.'();';
						echo 'MagicTree_'.$mt3_id.'();';
						echo 'MagicTree_'.$mt4_id.'();';
						?>">
	<div id="test" style='display:block;'>
	<?php echo '<div id="'.$mt1_id.'" style="position: absolute; top:5%; left:0; height:40%; width:50%; font-size: 1em;"></div>'?>
	<?php echo '<div id="'.$mt2_id.'" style="position: absolute; top:10%; right:0; height:40%; width:50%; font-size: 1em;"></div>'?>
	<?php echo '<div id="'.$mt3_id.'" style="position: absolute; top:50%; left:0; height:40%; width:45%; font-size: 1em;"></div>'?>
	<?php echo '<div id="'.$mt4_id.'" style="position: absolute; top:50%; right:0; height:40%; width:50%; font-size: 1em;"></div>'?>
	aaa
	<li>1</li>
	aaaaa
	</div>
	</body>
</html>