<?php
$page_title = 'Title';
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
                <h2>Update</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <form method="post" action="assets/update-classified.php">

                    <div class="mb-3">

                        <label for="classified_id">Anzeige</label>
                        <?php
                        echo '<select name="classified_id" class="form-select">';
                        foreach ($classifieds as $classified) {
                            echo '<option value="'.$classified['id'].'">' . $classified['title'] . '</option>';
                        }
                        echo '</select>';
                        ?>

                    </div>

                    <div class="mb-3">
                        <label for="classified_title" class="form-label">Anzeigen-Titel</label>
                        <textarea class="form-control" name="classified_title" id="classified_title"
                                  rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="classified_description" class="form-label">Anzeigen-Beschreibung</label>
                        <textarea class="form-control" name="classified_description" id="classified_description"
                                  rows="3"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Absenden</button>

                </form>

            </div>
        </div>
    </div>

<?php

require_once 'includes/footer.php';