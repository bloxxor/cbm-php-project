<?php

$if_clause = count(array_filter($_POST)) == count($_POST);

if ($if_clause) {

    $title = $_POST['classified_title'];
    $description = $_POST['classified_description'];

/*    $insert_sql = "INSERT INTO classifieds (
                      title,
                      description)
VALUES (
        :title,
        :description
        );";*/

//    $insert_sql = "SET @p0='$title';
//    SET @p1='$description';
//    CALL `insert_classified`(@p0, @p1);";

    include_once 'dbconnect.php';

    $insert_sql = '';
    db_connect('insert', $insert_sql, $title, $description);

}