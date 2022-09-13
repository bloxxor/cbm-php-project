<?php

// @TODO: Maybe move to index
include_once 'assets/dbconnect.php';

$classifieds = db_connect('read');

echo '<table>';
foreach ($classifieds as $classified) {
    echo "<tr>";
    echo '<td>' . $classified['title'] . '</td>';
    echo '<td>' . $classified['description'] . '</td>';
    echo '</tr>';
}
echo '</table>';