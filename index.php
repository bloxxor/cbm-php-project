<?php
require_once 'includes/header.php';
?>

<div class="wrapper">

    <form method="post" action="assets/insert-classified.php">

        <h2>Insert</h2>

        <label for="classified_title">Titel</label>
        <input type="text" name="classified_title">
        <br>
        <label for="classified_description">Beschreibung
            <textarea name="classified_description"></textarea>
        </label>

        <button type="submit">Absenden</button>

    </form>

    <hr>

    <h2>Read</h2>

</div>

<?php
require_once 'includes/footer.php';