<?php
require_once __DIR__ . '/../../infra/middlewares/middleware-not-authenticated.php';
$title = ' - Sign In';
include_once __DIR__ . '/../../templates/header.php';
?>
<main class="sing">
  <div class="col-12 h-100">
    <div class="d-md-flex h-100 ">
      <div class="img_sing row m-0 col-12 col-md-6 p-0 align-items-center justify-content-center text-center">
        <div class="col-5">
          <img src="/Trabalho_SIR/assets/image/logo_w.png" alt="logo" width="300px" height="auto">
        </div>
      </div>
      <div class="col-12 col-md-6 h100">
        <?php
        include_once __DIR__ . '/../../templates/error.php';
        ?>
        <div class="d-flex forms_sing">
          <div class="p-5 h-100">
            <form action="/Trabalho_SIR/controllers/auth/signin.php" method="post">
              <h1 class="pt-md-7 card-title h3 mb-3 fw-normal justify-content-center text-center">Login</h1>
              <div class="form-floating mb-2">
                <input type="email" class="form-control" id="Email" placeholder="Email" name="email" maxlength="255" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>">
                <label for="Email">Email</label>
              </div>
              <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" maxlength="255" value="<?= isset($_REQUEST['password']) ? $_REQUEST['password'] : null ?>">
                <label for="password">Password</label>
                <svg class="password-toggle" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#43555d" class="bi bi-eye-fill" viewBox="0 0 16 16" id="toggleIcon">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                </svg>
              </div>
              <div class="checkbox mb-4 custom-checkbox">
                <input type="checkbox" id="remember-me" value="remember-me">
                <label for="remember-me">Lembrar-me</label>
              </div>
              <div class="w-100 tx-c mb-3">
                <a class="small noacount" href="/Trabalho_SIR/pages/public/signup.php">Não tenho conta!</a>
              </div>
              <button class="w-100 btn btn-lg btn-warning-yellow mb-2" type="submit" name="user" value="login">Login</button>

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
<?php
include_once __DIR__ . '../../../templates/footer.php';
?>