<section>
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div id="successAlert" class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0" role="alert">';
        echo $_SESSION['success'] . '<br>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['errors'])) {
        echo '<div id="errorAlert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0" role="alert">';
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        unset($_SESSION['errors']);
    }
    ?>
</section>