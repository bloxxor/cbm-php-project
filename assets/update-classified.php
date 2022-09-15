<?php

include_once 'dbconnect.php';

$id = $_POST['classified_id'];
$title = $_POST['classified_title'];
$description = $_POST['classified_description'];

$update_sql = "SET @p0='$title'; 
SET @p1='$description'; 
SET @p2='$id'; 
CALL `update_classified`(@p0, @p1, @p2);";

db_connect('update', $update_sql);