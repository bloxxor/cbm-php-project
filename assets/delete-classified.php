<?php

$classified_id = $_POST['classified_id'];

$delete_sql = "DELETE FROM classifieds WHERE id = '$classified_id'";

include_once 'dbconnect.php';

db_connect('delete', $delete_sql);