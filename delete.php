<?php
$page_title = 'CBM - DELETE Statement';
$home_page = 'index.php';
$insert_page = 'insert.php';
$update_page = 'update.php';
$delete_page = 'delete.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

include_once 'assets/dbconnect.php';

$classifieds = db_connect('read');

?>
<div class="container">

    <div class="row">
        <div class="row">
            <h2>Delete</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">


            <form method="post" action="assets/delete-classified.php">

                <!--    <input type="text" name="classified_id" id="classified_id">-->

                <label for="classified_id">Anzeige</label>
                <?php
                echo '<select name="classified_id" class="form-select">';
                foreach ($classifieds as $classified) {
                    echo '<option value="' . $classified['id'] . '">' . $classified['title'] . '</option>';
                }
                echo '</select>';
                ?>

                <br>

                <button type="submit" class="btn btn-primary">Absenden</button>

            </form>

        </div>
    </div>
</div>