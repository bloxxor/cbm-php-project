<?php

$id = $_POST['classified_id'];
$title = $_POST['classified_title'];
$description = $_POST['classified_description'];

$update_sql = "UPDATE classifieds
SET title = '$title', description = '$description'
WHERE id = '$id'; ";

include_once 'dbconnect.php';

db_connect('update', $update_sql);