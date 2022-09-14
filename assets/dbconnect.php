<?php

/**
 * @param $action
 * @param null $sql
 * @param null $description
 * @param null $title
 * @return array
 */
function db_connect($action, $sql = NULL, $description = NULL, $title = NULL): array
{

    try {

        // Instantiate Database Connection
        $dbh = new PDO(
            'mysql:dbname=dbname;host=localhost;charset=utf8mb4',
            'root',
            'root'
        );

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

            $dbh = null;
            return $results;
        }

        if ( $action == 'delete') {
            $dbh->query($sql);
        }

        if ( $action == 'update') {
            $dbh->query($sql);
        }

        // Close Database Handle
        $dbh = null;

        header("Location: /index.php");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}