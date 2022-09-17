<?php

// Start Session, to store variable, if SQL successful
session_start();

/**
 * Re-Usable function to connet to the database
 * and execute SQL queries using the PDO Database-Connector
 *
 * @param $action
 * @param null $sql
 * @param null $title
 * @param null $description
 * @param null $image
 * @param null $id
 * @return array
 */
function db_connect($action, $sql = NULL, $title = NULL, $description = NULL, $image = NULL, $id = NULL): array
{

    try {

        // Instantiate Database Object
        $dbh = new PDO(
            'mysql:dbname=dbname;host=localhost;charset=utf8mb4',
            'root',
            'root'
        );

        if ($action == 'insert') {

            $entries = $dbh->prepare('CALL insert_classified(:title, :description, :image)');
            $entries->bindParam(':title', $title, PDO::PARAM_STR);
            $entries->bindParam(':description', $description, PDO::PARAM_STR);
            $entries->bindParam(':image', $image, PDO::PARAM_STR);
            $entries->execute();

            // Store session cookies to display the alert and define the message
            $_SESSION['success'] = true;
            $_SESSION['task'] = 'insert';

        }

        if ($action == 'update') {

            // Update classified with a stored procedure
            $entries = $dbh->prepare('CALL update_classified(:title, :description, :id)');
            $entries->bindParam(':title', $title, PDO::PARAM_STR);
            $entries->bindParam(':description', $description, PDO::PARAM_STR);
            $entries->bindParam(':id', $id, PDO::PARAM_STR);
            $entries->execute();

            // Store session cookies to display the alert and define the message
            $_SESSION['success'] = true;
            $_SESSION['task'] = 'update';

        }

        if ($action == 'read') {

            // Store session cookies to display the alert and define the message
            $read_classifieds_query = "SELECT * FROM classifieds";
            $return_values = $dbh->query($read_classifieds_query);
            $results = $return_values->fetchAll(PDO::FETCH_ASSOC);

            // Close the database handler, because of the return
            $dbh = null;

            return $results;

        }

        if ($action == 'delete') {

            $dbh->query($sql);

            // Store session cookies to display the alert and define the message
            $_SESSION['success'] = true;
            $_SESSION['task'] = 'delete';

        }

        // Close Database Handle
        $dbh = null;

        // Redirect to frontpage
        header("Location: /index.php");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return [];

}