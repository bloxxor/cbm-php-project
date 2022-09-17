<?php
function uploadImageFile(){

    // Set upload true as default
    $upload_allowed = true;
    $allowed_types = array(
        'image/png',
        'image/jpeg',
        'image/gif'
    );

    echo '<hr>';

    // Get all information from uploaded file
    // speichert den Upload in einem vom Webserver festgelegten temporären Verzeichnis
    $temp_file = $_FILES['classified_image']['tmp_name'];
    // Hole den Dateinamen
    $filename = $_FILES['classified_image']['name'];
    // Hole die Dateigröße
    $filesize = $_FILES['classified_image']['size'];
    // Holte die Größe der Datei
    $filetype = $_FILES['classified_image']['type'];

    echo '<hr>';

    // Filetype allowed
    if (!in_array($filetype, $allowed_types)) {
        $upload_allowed = false;
    }

    // Filesize allowed
    if ($filesize > 5000000) {// Erlaubt
        $upload_allowed = false;
    }

    // File exists
    if (file_exists('../uploads/' . $filename)) {
        //$upload_allowed = false;
        $filename = $filename . '-' . rand(1200, 5000);
    }

    // Move file!
    if ($upload_allowed) {
        move_uploaded_file($temp_file, "../uploads/" . $filename);
        echo "File uploaded!";
    } else {
        echo "Upload failed!";
    }

    return $filename;

}