<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
$title = 'Perfil';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
$user = user();
?>

<body>

    <div class="wrapper-user">
    <?php
        include_once __DIR__ . '../../../../templates/sidebar.php';
        ?>

        <div class="content-wrapper w_active h_cal .al-c">
        <?php
            include_once __DIR__ . '../../../../templates/bar_user.php';
            ?>
            <div class="div_table mx-4 bg-white static-top shadow">
                <section class="m-0 p-3">
                    <div class="d-sm-flex justify-content">
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="/Trabalho_SIR/">Voltar</a>
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-warning-yellow" href="./password.php">Mudar Password</a>
                    </div>
                </section>
                <section>
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0" role="alert">';
                        echo $_SESSION['success'] . '<br>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['errors'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0" role="alert">';
                        foreach ($_SESSION['errors'] as $error) {
                            echo $error . '<br>';
                        }
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        unset($_SESSION['errors']);
                    }
                    ?>
                </section>
                <section>
                    <form enctype="multipart/form-data" action="/Trabalho_SIR/controllers/admin/user.php" method="post" class="px-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" placeholder="name" maxlength="100" size="100" value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name'] ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Lastname</span>
                            <input type="text" class="form-control" name="lastname" placeholder="lastname" maxlength="100" size="100" value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : $user['lastname'] ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Phone Number</span>
                            <input type="tel" class="form-control" name="phoneNumber" maxlength="9" value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : $user['phoneNumber'] ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">CC Number</span>
                            <input type="tel" class="form-control" name="ccNumber" maxlength="9" value="<?= isset($_REQUEST['ccNumber']) ? $_REQUEST['ccNumber'] : $user['ccNumber'] ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">email</span>
                            <input type="email" class="form-control" name="email" maxlength="255" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email'] ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Picture</label>
                            <input accept="image/*" type="file" class="form-control" id="inputGroupFile01" name="foto" />
                        </div>
                        <div class="d-grid col-4 mx-auto">
                            <button class="w-100 btn btn-lg btn-success mb-2" type="submit" name="user" value="profile">Alterar</button>
                        </div>
                    </form>
                </section>
            </div>
            <?php
            include_once __DIR__ . '../../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <?php
    include_once __DIR__ . '../../../../templates/footer.php';
    ?>