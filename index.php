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
            <div class="col">
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

                echo '<table class="table table-striped table-bordered">';

                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">#</th>';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Beschreibung</th>';
                echo '</tr>';
                echo '</thead>';

                foreach ($classifieds as $classified) {
                    echo "<tr>";
                    echo '<td>' . $classified['id'] . '</td>';
                    echo '<td>' . htmlspecialchars($classified['title']) . '</td>';
                    echo '<td>' . $classified['description'] . '</td>';
                    echo '<td>';
                    echo '<form method="post" action="assets/delete-classified.php">';
                    echo '<button type="submit" class="btn btn-sm btn-danger" name="classified_id" value="' . $classified['id'] . '">Anzeige löschen</button>';
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