<?php

// @TODO: Maybe move to index
include_once 'assets/dbconnect.php';

$classifieds = db_connect('read');



?>

<h2>Delete</h2>

<form method="post" action="assets/delete-classified.php">

<!--    <input type="text" name="classified_id" id="classified_id">-->

    <label for="classified_id">ID</label>
    <?php
    echo '<select name="classified_id">';
    foreach ($classifieds as $classified) {
        echo '<option value="'.$classified['id'].'">' . $classified['title'] . '</option>';
    }
    echo '</select>';
    ?>

    <br>

    <button type="submit">Absenden</button>

</form>
