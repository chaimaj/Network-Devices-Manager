<?php
 
/*
 * examples/mysql/loaddata.php
 * 
 * This file is part of EditableGrid.
 * http://editablegrid.net
 *
 * Copyright (c) 2011 Webismymind SPRL
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://editablegrid.net/license
 */
      
require_once('../../../connexion/config.php');        

// Database connection                                   
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']); 
                      
// Get all parameters provided by the javascript
$id = $_POST['id'];
$tablename = $_POST['tablename'];
              

// This very generic. So this script can be used to update several tables.

$sql="DELETE FROM ".$tablename." WHERE id = '$id'";
mysqli_query($mysqli,$sql);   

echo $sql ? "ok" : "error";

      