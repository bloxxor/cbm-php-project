<?php

/**
 * @param $sql
 * @param $action
 * @param $title
 * @param $description
 * @return void
 */
function db_connect($action, $sql = NULL, $description = NULL, $title = NULL): array
{

    try {

        // Instantiate Database Connection
        $dbh = new PDO(
            'mysql:dbname=dbname;host=localhost',
            'root',
            'root'
        );

        echo 'Connection Successful!';

        if ($action == 'insert') {
            // Execute Query
            $entries = $dbh->prepare($sql);
            $entries->bindParam(':title', $title);
            $entries->bindParam(':description', $description);
            $entries->execute();
        }

        if ($action == 'read') {

            $read_classifieds_query = "SELECT * FROM classifieds";
            $return_values = $dbh->query($read_classifieds_query);
            $results = $return_values->fetchAll(PDO::FETCH_ASSOC);

            // var_dump($results);
            $dbh = null;
            return $results;
        }

        if ( $action == 'delete') {
            $dbh->query($sql);
            $dbh = null;
        }

        if ( $action == 'update') {
            $dbh->query($sql);
            $dbh = null;
        }

        // Close Database Handle
        $dbh = null;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}