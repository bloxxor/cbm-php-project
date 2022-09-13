<nav class="navbar navbar-expand-lg bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $insert_page; ?>">Insert</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $update_page; ?>">Update</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $delete_page; ?>">Delete</a>
                </li>

            </ul>

        </div>
    </div>
</nav>