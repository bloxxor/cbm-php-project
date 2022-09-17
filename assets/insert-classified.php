<?php

$if_clause = count(array_filter($_POST)) == count($_POST);

if ($if_clause) {

    include_once 'upload-image.php';

    $tempname = uploadImageFile();

    $title = $_POST['classified_title'];
    $description = $_POST['classified_description'];
    $id = $_POST['classified_id'];
    $image = 'uploads/' . $tempname;

    include_once 'dbconnect.php';

    $insert_sql = '';
    db_connect('insert', $insert_sql, $title, $description, $image, $id);

}