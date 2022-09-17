<?php
// Page Title -> header-php
$page_title = 'CBM - INSERT Statement';
// Menu Items ->navbar.php
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
            <h2>Anzeige einstellen</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <form class="needs-validation" method="post" action="assets/insert-classified.php" enctype="multipart/form-data" novalidate>

                <div class="mb-3">
                    <label for="classified_title" class="form-label">Anzeigen-Titel</label>
                    <input type="text" class="form-control" name="classified_title" id="classified_title" aria-describedby="title_help" required>
                    <div id="title_help" class="form-text">Pflichtfeld.</div>
                    <div class="invalid-feedback">
                        Bitte Titel eingeben.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="classified_description" class="form-label">Anzeigen-Beschreibung</label>
                    <textarea class="form-control" name="classified_description" id="classified_description" rows="3" required></textarea>
                </div>

                <div class="mb-5">
                    <label for="classified_image" class="form-label">Bild</label>
                    <input type="file" class="form-control" name="classified_image" id="classified_image" required>
                </div>

                <button class="btn btn-primary btn-lg" type="submit">Absenden</button>

            </form>

        </div>
    </div>
</div>

<?php

require_once 'includes/footer.php';