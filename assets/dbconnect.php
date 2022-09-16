<?php
session_start();
/**
 * @param $action
 * @param null $sql
 * @param null $description
 * @param null $title
 * @return array
 */
function db_connect($action, $sql = NULL, $title = NULL, $description = NULL, $id = NULL): array
{

    try {

        // Instantiate Database Connection
        $dbh = new PDO(
            'mysql:dbname=dbname;host=localhost;charset=utf8mb4',
            'root',
            'root'
        );

        if ($action == 'insert') {

            $entries = $dbh->prepare('CALL insert_classified(:title, :description)');
            $entries->bindParam(':title', $title, PDO::PARAM_STR);
            $entries->bindParam(':description', $description, PDO::PARAM_STR);
            $entries->execute();

            $_SESSION['success'] = true;
            $_SESSION['task'] = 'insert';
        }

        if ($action == 'update') {
            // $dbh->query($sql);

            $entries = $dbh->prepare('CALL update_classified(:title, :description, :id)');
            $entries->bindParam(':title', $title, PDO::PARAM_STR);
            $entries->bindParam(':description', $description, PDO::PARAM_STR);
            $entries->bindParam(':id', $id, PDO::PARAM_STR);
            $entries->execute();

            $_SESSION['success'] = true;
            $_SESSION['task'] = 'update';
        }

        if ($action == 'read') {
            $read_classifieds_query = "SELECT * FROM classifieds";
            $return_values = $dbh->query($read_classifieds_query);
            $results = $return_values->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            return $results;
        }

        if ($action == 'delete') {
            $dbh->query($sql);
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

}