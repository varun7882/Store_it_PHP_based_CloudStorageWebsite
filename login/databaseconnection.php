<?php

$db = new mysqli('localhost', 'a2379384_wayne', 'saitama01', 'a2379384_maindb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>