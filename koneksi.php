<?php
// ** Pengaturan MySQL ** //
/** MySQL hostname */
define('db_host','localhost');

/** MySQL database username */
define('db_user','root');

/** MySQL database password */
define('db_pass','');

/** Nama untuk database */
define('db_name','wbpl');
 
mysql_connect(db_host,db_user,db_pass);
mysql_select_db(db_name);
?>