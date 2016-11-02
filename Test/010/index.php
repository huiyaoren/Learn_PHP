<?php
require 'config.php';
require 'Database.php';


// $db  = new Database($config);
$db = Database::getinstance($config);
$db->update('tb_admin', "name='电风扇'", "id=1");
$db->select('*', 'tb_admin');


?>