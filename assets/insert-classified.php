<?php

$if_clause = count(array_filter($_POST)) == count($_POST);

if ($if_clause) {

    $title = $_POST['classified_title'];
    $description = $_POST['classified_description'];

    $insert_sql = "INSERT INTO classifieds (
                      title,
                      description)
VALUES (
        :title,
        :description
        );";

    include_once 'dbconnect.php';

    db_connect($insert_sql, 'insert', $title, $description);

} else {
    echo 'Bitte füllen Sie alle Felder aus!';
}