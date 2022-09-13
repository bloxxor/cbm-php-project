<?php
$page_title = 'Title';
$home_page = 'index.php';
$insert_page = 'insert.php';
$update_page = 'update.php';
$delete_page = 'delete.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container">

    <div class="row">
        <div class="row">
            <h2>Insert</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <form method="post" action="assets/insert-classified.php">

                <div class="mb-3">
                    <label for="classified_title" class="form-label">Anzeigen-Titel</label>
                    <input type="text" class="form-control" name="classified_title" id="classified_title" aria-describedby="title_help">
                    <div id="title_help" class="form-text">Required.</div>
                </div>

                <div class="mb-3">
                    <label for="classified_description" class="form-label">Anzeigen-Beschreibung</label>
                    <textarea class="form-control" name="classified_description" id="classified_description" rows="3"></textarea>
                </div>

                <button class="btn btn-primary" type="submit">Absenden</button>

            </form>

        </div>
    </div>
</div>

<?php

require_once 'includes/footer.php';