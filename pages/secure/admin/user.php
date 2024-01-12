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
        <div class="content-wrapper w_active h_cal al-c">
            <?php
            include_once __DIR__ . '/../../../templates/bar_user.php';
            ?>
            <div class="div_table mx-xs-3 mx-sm-4 bg-white static-top shadow">
                <section class="m-0 p-3">
                    <div class="d-sm-flex justify-content">
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="./">Voltar</a>
                    </div>
                </section>
                <?php
                include_once __DIR__ . '../../../../templates/error.php';
                ?>
                <section class="pb-4">
                    <form enctype="multipart/form-data" action="/Trabalho_SIR/controllers/admin/user.php" method="post" class="px-3">
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Nome:</span>
                                <input type="text" class="form-control" name="name" maxlength="100" size="100" value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : null ?>" required>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Apelido:</span>
                                <input type="text" class="form-control" name="lastname" maxlength="100" size="100" value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Telemóvel:</span>
                                <input type="tel" class="form-control" name="phoneNumber" maxlength="9" value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : null ?>" required>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">CC:</span>
                                <input type="tel" class="form-control" name="ccNumber" maxlength="9" value="<?= isset($_REQUEST['ccNumber']) ? $_REQUEST['ccNumber'] : null ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <label class="small" for="inputGroupFile01">Foto:</label>
                                <input accept="image/*" type="file" class="form-control" id="inputGroupFile01" name="foto" />
                            </div>

                        </div>
                        <div class="input col-12 mb-3">
                            <span class="small">E-mail:</span>
                            <input type="email" class="form-control" name="email" maxlength="255" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>" required>
                        </div>
                        <div class="input col-12 mb-3">
                            <span class="small">Password:</span>
                            <input type="password" class="form-control" name="password" maxlength="255" required>
                        </div>
                        <div class="input col-12 mb-3">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="administrator" role="switch" id="flexSwitchCheckChecked" <?= isset($_REQUEST['administrator']) && $_REQUEST['administrator'] == true ? 'checked' : null ?>>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Administrator</label>
                            </div>
                        </div>
                        <div class="d-grid col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <input type="hidden" name="id" value="<?= isset($_REQUEST['id']) ? $_REQUEST['id'] : null ?>">
                            <input type="hidden" name="foto" value="<?= isset($_REQUEST['foto']) ? $_REQUEST['foto'] : null ?>">
                            <button type="submit" class="w-100 btn btn-warning-yellow mb-3" name="user" <?= isset($_REQUEST['action']) && $_REQUEST['action'] == 'update' ? 'value="update"' : 'value="create"' ?>><?php echo isset($_REQUEST['action']) && $_REQUEST['action'] == 'update' ? 'Alterar' : 'Criar'; ?></button>
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