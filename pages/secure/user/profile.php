<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
$title = 'Perfil';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
$user = user();
$userPhotoPath =  "../assets/images/uploads/" . $user['foto'];
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
            <div class="div_table mx-xs-3 mx-sm-4 bg-white static-top shadow">
                <section class="m-0 p-3">
                    <div class="d-sm-flex justify-content">
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="../">Voltar</a>
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 mx-0 mx-sm-3  mb-3 mb-sm-0 btn-warning-yellow" href="./password.php">Mudar Password</a>
                    </div>
                </section>
                <?php
                include_once __DIR__ . '../../../../templates/error.php';
                ?>
                <section>
                    <form enctype="multipart/form-data" action="../controllers/admin/user.php" method="post" class="px-3">
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Nome:</span>
                                <input type="text" class="form-control" name="name" placeholder="name" maxlength="100" size="100" value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name'] ?>" required>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Apelido:</span>
                                <input type="text" class="form-control" name="lastname" placeholder="lastname" maxlength="100" size="100" value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : $user['lastname'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Telemóvel:</span>
                                <input type="tel" class="form-control" name="phoneNumber" maxlength="9" value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : $user['phoneNumber'] ?>" required>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">CC:</span>
                                <input type="tel" class="form-control" name="ccNumber" maxlength="9" value="<?= isset($_REQUEST['ccNumber']) ? $_REQUEST['ccNumber'] : $user['ccNumber'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Email:</span>
                                <input type="email" class="form-control" name="email" maxlength="255" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email'] ?>" readonly>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <label class="small" for="foto">Fotografia:</label>
                                <input accept="image/*" type="file" class="form-control" id="foto" name="foto" />
                            </div>
                        </div>
                        <div class="d-grid col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <button class="w-100 btn btn-warning-yellow mb-3" type="submit" name="user" value="profile">Alterar</button>
                        </div>
                    </form>
                </section>
            </div>
            <?php
            include_once __DIR__ . '../../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <!-- <?php include_once __DIR__ . '../../../templates/footer.php'; ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../js/script_user.js"></script>
  <script src="../js/search.js"></script>
</body>

</html>