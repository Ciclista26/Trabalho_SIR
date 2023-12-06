<?php
require_once __DIR__ . '/../../../infra/middlewares/middleware-administrator.php';
require_once __DIR__ . '/../../../templates/header.php';

$user = user();
$title = 'Utilizadores';
?>

<body>

    <div class="wrapper-user">
        <?php
        include_once __DIR__ . '/../../../templates/sidebar.php';
        ?>

        <div class="content-wrapper w_active h_cal .al-c">
            <?php
            include_once __DIR__ . '/../../../templates/bar_user.php';
            ?>
            <div class="div_table mx-4 bg-white static-top shadow">
                <section class="m-0 p-3">
                    <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="./">Voltar</a>
                </section>
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
                <section class="pb-4">
                    <form enctype="multipart/form-data" action="/Trabalho_SIR/controllers/admin/user.php" method="post" class="px-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" maxlength="100" size="100" value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : null ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Last Name</span>
                            <input type="text" class="form-control" name="lastname" maxlength="100" size="100" value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Phone Number</span>
                            <input type="tel" class="form-control" name="phoneNumber" maxlength="9" value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : null ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">CC Number</span>
                            <input type="tel" class="form-control" name="ccNumber" maxlength="9" value="<?= isset($_REQUEST['ccNumber']) ? $_REQUEST['ccNumber'] : null ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">E-mail</span>
                            <input type="email" class="form-control" name="email" maxlength="255" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Foto Profile</label>
                            <input accept="image/*" type="file" class="form-control" id="inputGroupFile01" name="foto" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="password" class="form-control" name="password" maxlength="255" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="administrator" role="switch" id="flexSwitchCheckChecked" <?= isset($_REQUEST['administrator']) && $_REQUEST['administrator'] == true ? 'checked' : null ?>>
                                <label class="form-check-label" for="flexSwitchCheckChecked">administrator</label>
                            </div>
                        </div>
                        <div class="d-grid col-4 mx-auto">
                            <input type="hidden" name="id" value="<?= isset($_REQUEST['id']) ? $_REQUEST['id'] : null ?>">
                            <input type="hidden" name="foto" value="<?= isset($_REQUEST['foto']) ? $_REQUEST['foto'] : null ?>">
                            <button type="submit" class="btn btn-success" name="user" <?= isset($_REQUEST['action']) && $_REQUEST['action'] == 'update' ? 'value="update"' : 'value="create"' ?>>Create</button>
                        </div>
                    </form>
                </section>



            </div>
            <?php
            include_once __DIR__ . '/../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../templates/footer.php';
    ?>