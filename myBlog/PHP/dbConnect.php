<?php
/**
 * Created by PhpStorm.
 * User: 1314863
 * Date: 14/03/2016
 * Time: 10:14
 */
define('DB_SERVER', 'ap-cdbr-azure-east-c.cloudapp.net');
define('DB_USERNAME','baffe4b0cb391d');
define('DB_PASSWORD', 'a091b3e1');
define('DB_DATABASE', 'cmm007aldb-1314863');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$db) {
    die("Connection Failed Buddie: " . mysqli_connect_error());
}

