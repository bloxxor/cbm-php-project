<?php
$page_title = 'CBM - Homepage';
require_once 'includes/header.php';

$home_page = 'index.php';
$insert_page = 'insert.php';
$update_page = 'update.php';
$delete_page = 'delete.php';
require_once 'includes/navbar.php';

?>

    <div class="container">
        <div class="row">
            <div class="col">

                <h1 class="mb-5">Kleinanzeigen</h1>

                <?php

                include_once 'assets/dbconnect.php';

                if ($_SESSION['success']) {
                    $task = $_SESSION['task'];
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    switch($_SESSION['task']) {
                        case $task == 'insert':
                            echo 'Anzeige erstellt!';
                            break;
                        case $task == 'update':
                            echo 'Anzeige aktualisiert!';
                            break;
                        case $task == 'delete':
                            echo 'Anzeige gelöscht!';
                            break;
                    }
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }

                $classifieds = db_connect('read');

                echo '<table class="table-classifieds table table-striped table-bordered table-hover align-middle">';

                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">#</th>';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Beschreibung</th>';
                echo '<th scope="col">Bild</th>';
                echo '<th scope="col"></th>';
                echo '</tr>';
                echo '</thead>';

                foreach ($classifieds as $classified) {
                    echo "<tr>";
                    echo '<td>' . $classified['id'] . '</td>';
                    echo '<td>' . htmlspecialchars($classified['title']) . '</td>';
                    echo '<td>' . $classified['description'] . '</td>';
                    echo '<td style="width: 20%;"><img class="img-fluid" src="' . $classified['image'] . '"></td>';
                    echo '<td style="width: 10%;">';
                    echo '<form method="post" action="assets/delete-classified.php">';
                    echo '<div class="btn-group" role="group" aria-label="Basic example">';
                    echo '<a type="button" class="btn btn-success btn-sm" href="update.php">Ändern</a>';
                    echo '<button type="submit" class="btn btn-danger btn-sm" name="classified_id" value="' . $classified['id'] . '">Löschen</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';

                ?>

            </div>
        </div>
    </div>

<?php

session_destroy();

require_once 'includes/footer.php';