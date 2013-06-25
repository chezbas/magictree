-==--=----==-=---==--=----==-=---==--=----==-=--
Welcome to quick install manual
-==--=----==-=---==--=----==-=---==--=----==-=--

Copy directories release version in your root web site directory

includes : if an includes directory already exists in your root web site, just add contents package to your own
demo : ( if exists )
MTxxxx

For Unix server
Setup rights to have read/write acces to this directory

-==--=----==-=---==--=----==-=---==--=----==-=--
Demo Database
-==--=----==-=---==--=----==-=---==--=----==-=--

import file MySQL_MT.sql into your database schema


-==--=----==-=---==--=----==-=---==--=----==-=--
Demo Final setup
-==--=----==-=---==--=----==-=---==--=----==-=--

Setup main php database access into files includes/MTSetup/setup.php and replace following lines
define("__MAGICTREE_DATABASE_SCHEMA__","xxxxxx");	// Schema
define("__MAGICTREE_DATABASE_USER__","xxxxxx");	// user
define("__MAGICTREE_DATABASE_PASSWORD__","xxxxxx");	// password


-==--=----==-=---==--=----==-=---==--=----==-=--
Run demo
-==--=----==-=---==--=----==-=---==--=----==-=--
http://localhost/demo/


-==--=----==-=---==--=----==-=---==--=----==-=--
See technical documentation
-==--=----==-=---==--=----==-=---==--=----==-=--
Only if you have installed full package
in your tree custom file
by
	$my_tree_object->define_attribute('__active_tech_doc', true);

url access
http://localhost/MTPackage/indextech.php
Eg:
http://localhost/MT0.10/indextech.php
