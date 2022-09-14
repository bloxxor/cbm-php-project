<?php

$classified_id = $_POST['classified_id'];

var_dump($classified_id);

$delete_sql = "DELETE FROM classifieds WHERE ID = '$classified_id'";

include_once 'dbconnect.php';

db_connect('delete', $delete_sql);