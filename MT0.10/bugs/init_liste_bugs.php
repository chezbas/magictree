<?php 
	$lisha_mt_id = 'lisha_bugs_id';

	// Force vimofy language from framework language
	$_GET['lng'] = $_SESSION[$ssid]['MT']['langue'];
	
	// Use framework connexion information from framework
	$_SESSION[$ssid]['lisha'][$lisha_mt_id] = new lisha(
														$lisha_mt_id,$ssid,
														__MYSQL__,
														array('user' => __MAGICTREE_DATABASE_USER__,'password' => __MAGICTREE_DATABASE_PASSWORD__,'host' => __MAGICTREE_DATABASE_HOST__,'schema' => __MAGICTREE_DATABASE_SCHEMA__),
														'../'.__LISHA_APPLICATION_RELEASE__.'/',
														null,
														false,
														__LISHA_APPLICATION_RELEASE__
														);
	
	// Create a reference to the session
	$obj_lisha_bug = &$_SESSION[$ssid]['lisha'][$lisha_mt_id];
	
	//==================================================================
	// Define main query
	//==================================================================
	$query = "	SELECT
					REP.`ID` AS 'id',
					TEXD.`text` AS 'business',
					REP.`Type` AS 'type',
					-- REP.`Classe` AS 'classe',
					TEXC.`text` AS 'classe',
					REP.`Version` AS 'version',
					DATE_FORMAT(REP.`DateCrea`,'%Y-%m%-%d') AS 'DateCrea',
					(
						SELECT
							CASE TEX.`id`
								WHEN 4
								THEN CONCAT('[S]',REP.`Description`,'[/S]')
								ELSE
									REP.`Description`
								END	
					) AS 'Description',
					CONCAT('[img]',CLAS.`symbol`,'[/img]') AS 'flag',
					CONCAT(
								(
									SELECT
							 			CASE IFNULL( LENGTH( REP.`details` ) , 0 ) + IFNULL( LENGTH( REP.`solution` ) , 0 ) 
											WHEN 0
											THEN CONCAT('[URL=./editbug.php?ssid=".$ssid."&MTLNG=".$_GET['lng']."&ID=',REP.`ID`,']".$_SESSION[$ssid]['page_text'][19]['MT']."[/URL]')
											ELSE CONCAT('<a target=\"_blank\" onclick=\"lisha_StopEventHandler(event);\"[URL=./viewbug.php?ssid=".$ssid."&MTLNG=".$_GET['lng']."&ID=',REP.`ID`,']".$_SESSION[$ssid]['page_text'][20]['MT']."[/URL]</a>',' / ','<a target=\"_blank\" onclick=\"lisha_StopEventHandler(event);\"[URL=./editbug.php?ssid=".$ssid."&MTLNG=".$_GET['lng']."&ID=',REP.`ID`,']".$_SESSION[$ssid]['page_text'][21]['MT']."[/URL]</a>')
										END
								)
						  ) AS 'details',
					REP.`Qui` AS 'qui',
					TEX.`text` AS 'status',
					REP.`reference` AS 'reference',
					REP.`Last_mod` AS 'last_mod'
				FROM
					`".__MAGICTREE_TABLE_EXTRA_TICK__."` REP,
					`".__MAGICTREE_TABLE_EXTRA_TICK_TEXT__."` TEX,
					`".__MAGICTREE_TABLE_EXTRA_TICK_CLAS__."` CLAS,
					`".__MAGICTREE_TABLE_EXTRA_TICK_CLAS__."` CLASC,
					`".__MAGICTREE_TABLE_EXTRA_TICK_CLAS__."` CLASD,
					`".__MAGICTREE_TABLE_EXTRA_TICK_TEXT__."` TEXC,
					`".__MAGICTREE_TABLE_EXTRA_TICK_TEXT__."` TEXD
				WHERE 1 = 1
					AND CLAS.`id` = TEX.`id`
					AND CLAS.`class` = 'status'
					AND CLASC.`id` = REP.`Classe`
					AND CLASC.`class` = 'class'
					AND CLASD.`id` = REP.`Business`
					AND CLASD.`class` = 'business'
					AND REP.`Classe` = TEXC.`id`
					AND REP.`Business` = TEXD.`id` 
					AND TEX.`id_lang` = TEXC.`id_lang`
					AND TEX.`id_lang` = TEXD.`id_lang`
					AND REP.`status` = TEX.`id`
					AND TEX.`id_lang` = '".$_GET['lng']."'
				";

	$obj_lisha_bug->define_attribute('__main_query', $query);
	//==================================================================
	
	//==================================================================
	// Lisha display setup
	//==================================================================
	$obj_lisha_bug->define_size(100,'%',100,'%');											
	$obj_lisha_bug->define_nb_line(50);													
	$obj_lisha_bug->define_attribute('__active_readonly_mode', __RW__);	// Read & Write	
	$obj_lisha_bug->define_attribute('__id_theme','grey');					// Define style	

	$obj_lisha_bug->define_attribute('__active_title', true);				// Title bar	
	$obj_lisha_bug->define_attribute('__title', $_SESSION[$ssid]['page_text'][1]['MT']);		// Title	

	$obj_lisha_bug->define_attribute('__max_lines_by_page', 80);			// Limit rows by page	
	
	$obj_lisha_bug->define_attribute('__active_column_separation',true);
	$obj_lisha_bug->define_attribute('__active_row_separation',true);

	$obj_lisha_bug->define_attribute('__active_top_bar_page',false);
	$obj_lisha_bug->define_attribute('__active_bottom_bar_page',true);

	$obj_lisha_bug->define_attribute('__active_user_doc', false);			// user documentation button
	$obj_lisha_bug->define_attribute('__active_tech_doc', false);			// technical documentation button
	$obj_lisha_bug->define_attribute('__active_ticket', false);				// Tickets link

	$obj_lisha_bug->define_attribute('__display_mode', __NMOD__);			// Display mode
	
	$obj_lisha_bug->define_attribute('__key_url_custom_view', 'fixe');		// Defined key for quick custom view loader in url browser

	$obj_lisha_bug->define_attribute('__update_table_name', "bugsreports");	// Update table
	//==================================================================
		
		
		//==================================================================
		// define column : ID
		//==================================================================
		$obj_lisha_bug->define_column('id',$_SESSION[$ssid]['page_text'][2]['ST'],__TEXT__,__WRAP__,__CENTER__,__EXACT__);						
		$obj_lisha_bug->define_attribute('__column_input_check_update', __FORBIDDEN__,'id');
		//==================================================================

		//==================================================================
		// define column : Business domain
		//==================================================================
		$obj_lisha_bug->define_column('business',$_SESSION[$ssid]['page_text'][13]['ST'],__TEXT__,__WRAP__,__CENTER__,__EXACT__);						
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'business');
		
		$obj_lisha_bug->define_lov("	SELECT
											CLAS.`id` AS 'ID',
											TEX.`text` AS 'Libelle',
											CLAS.`order` AS 'ord'
										FROM
											`".__MAGICTREE_TABLE_EXTRA_TICK_CLAS__."` CLAS, `".__MAGICTREE_TABLE_EXTRA_TICK_TEXT__."` TEX
										WHERE 1 = 1
											AND TEX.`id` = CLAS.`id`
											AND TEX.`id_lang` = '".$_GET['lng']."'
											AND CLAS.`class` = 'business'",
									$_SESSION[$ssid]['page_text'][13]['MT'],
									'ID'
								   );
		$obj_lisha_bug->define_column_lov('Libelle',$_SESSION[$ssid]['page_text'][28]['MT'],__TEXT__,__WRAP__,__LEFT__,__PERCENT__,__DISPLAY__,true);
		$obj_lisha_bug->define_column_lov('ord',$_SESSION[$ssid]['page_text'][18]['MT'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov('ID',$_SESSION[$ssid]['page_text'][2]['ST'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov_order('ord',__ASC__);
		//==================================================================
		
		//==================================================================
		// define column : Theme
		//==================================================================
		$obj_lisha_bug->define_column('type',$_SESSION[$ssid]['page_text'][3]['ST'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'type');
		
		$obj_lisha_bug->define_lov("	SELECT
											DISTINCT
											BUG.`Type` AS 'Type',
											MAX(BUG.`Last_mod`) AS 'Lastmod'
										FROM
											`".__MAGICTREE_TABLE_EXTRA_TICK__."` BUG
										GROUP BY Type",
									$_SESSION[$ssid]['page_text'][3]['LT'],
									'Type'
								   );
		$obj_lisha_bug->define_column_lov('Type',$_SESSION[$ssid]['page_text'][3]['MT'],__TEXT__,__WRAP__,__LEFT__,__PERCENT__,__DISPLAY__,true);
		$obj_lisha_bug->define_column_lov('Lastmod',$_SESSION[$ssid]['page_text'][12]['MT'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov_order('Lastmod',__DESC__);
		//==================================================================
					
		//==================================================================
		// define column : Bug class
		//==================================================================
		$obj_lisha_bug->define_column('classe',$_SESSION[$ssid]['page_text'][4]['ST'],__TEXT__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'classe');
		
		$obj_lisha_bug->define_lov("	SELECT
											CLAS.`id` AS 'ID',
											TEX.`text` AS 'Libelle',
											CLAS.`order` AS 'ord'
										FROM
											`".__MAGICTREE_TABLE_EXTRA_TICK_CLAS__."` CLAS, `".__MAGICTREE_TABLE_EXTRA_TICK_TEXT__."` TEX
										WHERE 1 = 1
											AND TEX.`id` = CLAS.`id`
											AND TEX.`id_lang` = '".$_GET['lng']."'
											AND CLAS.`class` = 'class'",
									$_SESSION[$ssid]['page_text'][4]['LT'],
									'ID'
								   );
		$obj_lisha_bug->define_column_lov('Libelle',$_SESSION[$ssid]['page_text'][4]['MT'],__TEXT__,__WRAP__,__LEFT__,__PERCENT__,__DISPLAY__,true);
		$obj_lisha_bug->define_column_lov('ord',$_SESSION[$ssid]['page_text'][18]['MT'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov('ID',$_SESSION[$ssid]['page_text'][2]['ST'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov_order('ord',__ASC__);
		//==================================================================
				
		//==================================================================
		// define column : Application version involved
		//==================================================================
		$obj_lisha_bug->define_column('version',$_SESSION[$ssid]['page_text'][5]['MT'],__TEXT__,__WRAP__,__CENTER__,__EXACT__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'version');
		//==================================================================
				
		//==================================================================
		// define column : Create date
		//==================================================================
		$obj_lisha_bug->define_column('DateCrea',$_SESSION[$ssid]['page_text'][6]['MT'],__DATE__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'DateCrea');
		$obj_lisha_bug->define_attribute('__column_date_format','%d/%m/%Y','DateCrea');
		//==================================================================
		
		//==================================================================
		// define column : Bug title
		//==================================================================
		$obj_lisha_bug->define_column('Description',$_SESSION[$ssid]['page_text'][7]['MT'],__BBCODE__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'Description');
		$obj_lisha_bug->define_input_focus('Description', true);					// Focused
		//==================================================================
				
		//==================================================================
		// define column : Status
		//==================================================================
		$obj_lisha_bug->define_column('status',$_SESSION[$ssid]['page_text'][8]['ST'],__TEXT__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'status');
		
		$obj_lisha_bug->define_lov("	SELECT
											CLAS.`id` AS 'ID',
											TEX.`text` AS 'Libelle',
											CLAS.`order` AS 'ord',
											CONCAT('[img]',CLAS.`symbol`,'[/img]') AS 'symbol'
										FROM
											`".__MAGICTREE_TABLE_EXTRA_TICK_CLAS__."` CLAS, `".__MAGICTREE_TABLE_EXTRA_TICK_TEXT__."` TEX
										WHERE 1 = 1
											AND TEX.`id` = CLAS.`id`
											AND TEX.`id_lang` = '".$_GET['lng']."'
											AND CLAS.`class` = 'status'",
									$_SESSION[$ssid]['page_text'][8]['LT'],
									'ID'
								   );
		$obj_lisha_bug->define_column_lov('Libelle',$_SESSION[$ssid]['page_text'][8]['MT'],__TEXT__,__WRAP__,__LEFT__,__PERCENT__,__DISPLAY__,true);
		$obj_lisha_bug->define_column_lov('symbol',$_SESSION[$ssid]['page_text'][8]['MT'],__BBCODE__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov('ord',$_SESSION[$ssid]['page_text'][18]['MT'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov('ID',$_SESSION[$ssid]['page_text'][2]['ST'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov_order('ord',__ASC__);
		//==================================================================
				
		//==================================================================
		// define column : Status symbol
		//==================================================================
		// COLUMN
		$obj_lisha_bug->define_column('flag',$_SESSION[$ssid]['page_text'][11]['MT'],__BBCODE__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __FORBIDDEN__,'flag');
		//==================================================================
				
		//==================================================================
		// define column : Action on further details
		//==================================================================
		$obj_lisha_bug->define_column('details',$_SESSION[$ssid]['page_text'][9]['MT'],__BBCODE__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __FORBIDDEN__,'details');
		//==================================================================
				
		//==================================================================
		// define column : Who
		//==================================================================
		$obj_lisha_bug->define_column('qui',$_SESSION[$ssid]['page_text'][10]['MT'],__TEXT__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __REQUIRED__,'qui');
		//==================================================================

		//==================================================================
		// define column : Dev reference
		//==================================================================
		$obj_lisha_bug->define_column('reference',$_SESSION[$ssid]['page_text'][25]['ST'],__BBCODE__,__WRAP__,__CENTER__);

		$obj_lisha_bug->define_lov("	SELECT
											DISTINCT
											BUG.`reference` AS 'reference',
											MAX(BUG.`Last_mod`) AS 'Lastmod'
										FROM
											`".__MAGICTREE_TABLE_EXTRA_TICK__."` BUG
										WHERE BUG.`reference` IS NOT NULL
										GROUP BY reference",
									$_SESSION[$ssid]['page_text'][25]['LT'],
									'reference'
								   );
		$obj_lisha_bug->define_column_lov('reference',$_SESSION[$ssid]['page_text'][25]['MT'],__TEXT__,__WRAP__,__LEFT__,__PERCENT__,__DISPLAY__,true);
		$obj_lisha_bug->define_column_lov('Lastmod',$_SESSION[$ssid]['page_text'][12]['MT'],__TEXT__,__WRAP__,__LEFT__);
		$obj_lisha_bug->define_column_lov_order('Lastmod',__DESC__);
		//==================================================================
		
		//==================================================================
		// define column : Last update
		//==================================================================
		$obj_lisha_bug->define_column('last_mod',$_SESSION[$ssid]['page_text'][12]['MT'],__DATE__,__WRAP__,__CENTER__);
		$obj_lisha_bug->define_attribute('__column_input_check_update', __FORBIDDEN__,'last_mod');
		$obj_lisha_bug->define_attribute('__column_date_format','%d/%m/%Y','last_mod');
		//==================================================================

		
	//==================================================================
	// Table columns primary key
	// Caution : Can't change key column name from origine query column name
	// It's not required to declare column key with define_column method
	//==================================================================
	$obj_lisha_bug->define_key(Array('id'));
	//==================================================================
		
	//==================================================================
	// Column order : Define in ascending priority means first line defined will be first priority column to order by and so on...
	//==================================================================
	$obj_lisha_bug->define_order_column('last_mod',__DESC__);					
	//==================================================================
		
	//==================================================================
	// Cyclic theme lines
	//==================================================================
	$obj_lisha_bug->define_line_theme("DDDDFF","0.7em","CCCCEE","0.7em","68B7E0","0.7em","46A5C0","0.7em","000","000");
	$obj_lisha_bug->define_line_theme("EEEEEE","0.7em","D0DCE0","0.7em","AEE068","0.7em","8CC046","0.7em","000","000");
	//==================================================================

	
	
	
	//==================================================================
	// Do not remove this bloc
	// Keep this bloc at the end
	//==================================================================
	$obj_lisha_bug->generate_public_header();   
	$obj_lisha_bug->generate_header();
	//==================================================================			
?>