<?php

/**
 * @param $sql
 * @param $action
 * @param $title
 * @param $description
 * @return void
 */
function db_connect($sql, $action, $title, $description): void
{

    try {

        $dbh = new PDO(
            'mysql:dbname=dbname;host=localhost',
            'root',
            'root'
        );

        echo 'Connection Succesful!';

        // Execute Query
        $entries = $dbh->prepare($sql);
        $entries->bindParam(':title', $title);
        $entries->bindParam(':description', $description);
        $entries->execute();

        $dbh = null;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}