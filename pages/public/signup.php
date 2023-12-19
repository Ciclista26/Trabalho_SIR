<?php
require_once __DIR__ . '/../../infra/middlewares/middleware-not-authenticated.php';
$title = '- Sign Up';
require_once __DIR__ . '../../../templates/header.php';
?>
<!-- sign in -->
<main class="sing">
  <div class="col-12 h-100">
    <div class="d-md-flex h-100 ">
      <div class="img_sing row m-0 col-12 col-md-6 p-0 align-items-center justify-content-center text-center">
        <div class="col-5">
          <img src="/Trabalho_SIR/assets/image/logo_w.png" alt="logo" width="300px" height="auto">
        </div>
      </div>
      <div class="col-12 col-md-6 h100">
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
        <div class="d-flex forms_sing">
          <div class="p-5 h-100">
            <form action="/Trabalho_SIR/controllers/auth/signup.php" method="post">
              <h1 class="card-title h3 mb-3 fw-normal justify-content-center text-center">Sign Up</h1>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" name="name" placeholder="name" maxlength="100" size="100" value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : null ?>" required>
                <label for="name">Nome</label>
              </div>
              <div class="form-floating mb-2">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="ccNumber" placeholder="123456789" value="<?= isset($_REQUEST['ccNumber']) ? $_REQUEST['ccNumber'] : null ?>">
                <label for="floatingInput">CC</label>
              </div>
              <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <div class="form-floating mb-2">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                <label for="confirm_password">Confirm Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-warning-yellow mb-2" type="submit" name="user" value="signUp">Sign Up</button>
            </form>
            <a href="/Trabalho_SIR/index.php"><button class="w-100 btn btn-lg btn-secondary">Voltar</button></a>
          </div>

          <?php
          include_once __DIR__ . '../../../templates/Empowered.php';
          ?>
        </div>
      </div>

    </div>
  </div>
  </div>
</main>
<!-- Fim sing in -->
<?php
include_once __DIR__ . '../../../templates/footer.php';
?>