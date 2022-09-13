<?php
$sql_query = "CREATE TABLE Products
(
    ID                 int unsigned        NOT NULL AUTO_INCREMENT,
    title          int unsigned UNIQUE NOT NULL,
    description        varchar(255)        NOT NULL,
    PRIMARY KEY (ID)
);";

try {

    $dbh = new PDO(
        "mysql:dbname=dbname;host=localhost",
        "root",
        "root"
    );

    echo "Connection Successful";

    $dbh->query($sql_query);

    $dbh = null;

} catch (PDOException $e) {
    echo $e->getMessage();
}