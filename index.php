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
                    echo '<td>' . $classified['description'] . '</td>';
                    echo '<td>' . $classified['title'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';

                ?>

            </div>
        </div>
    </div>

<?php
require_once 'includes/footer.php';