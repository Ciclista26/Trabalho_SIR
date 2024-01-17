<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = 'Mudar Password';
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
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="../pages/secure/user/profile.php">Voltar</a>
                    </div>
                </section>
                <?php
                include_once __DIR__ . '../../../../templates/error.php';
                ?>
                <section>
                    <form action="../controllers/admin/user.php" method="post" class="px-3">
                        <div class="input mb-3">
                            <span class="small">Password Atual:</span>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="input mb-3">
                            <span class="small">Nova Password:</span>
                            <input type="password" class="form-control" name="password" maxlength="255" required>
                        </div>
                        <div class="input mb-3">
                            <span class="small">Confirmar Password:</span>
                            <input type="password" class="form-control" name="confirm_password" maxlength="255" required>
                        </div>
                        <div class="d-grid col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <button class="w-100 btn btn-warning-yellow mb-3" type="submit" name="user" value="password">Alterar</button>
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